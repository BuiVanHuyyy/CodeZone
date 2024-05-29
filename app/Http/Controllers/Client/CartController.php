<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Order;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(int|string $id): JsonResponse
    {

        $course = Course::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$course->id])) {
            return response()->json(['message' => 'Khóa học đã có trong giỏ hàng rồi  !', 'cart' => $cart, 'type' => 'warning']);
        }
        $cart[$course->id] = [
            'name' => $course->title,
            'price' => $course->price,
            'image' => $course->thumbnail,
        ];
        session()->put('cart', $cart);
        return response()->json(['message' => 'Khóa học đã được thêm vào giỏ hành thành công!', 'cart' => $cart, 'type' => 'success']);
    }
    public function removeFromCart(int|string $id): JsonResponse
    {
        $course = Course::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$course->id])) {
            unset($cart[$course->id]);
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Course removed from cart successfully!', 'totalItem' => count($cart)]);
    }
    public function placeOrder(Request $request): Application|JsonResponse|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $cart = session()->get('cart', []);

            if (count($cart) === 0) {
                return redirect()->back()->with(['message' => 'Giỏ hàng trống!', 'icon' => 'warning']);
            }
            $order = new Order();
            $order->student_id = Auth::user()->student->id;
            $order->total_price = collect($cart)->sum('price');
            $order->payment_method = $request->payment_method;
            $order->status = 'pending';
            $order->save();
            foreach ($cart as $id => $item) {
                $enrollment = new Enrollment();
                $enrollment->order_id = $order->id;
                $enrollment->course_id = $id;
                $enrollment->price = $item['price'];
                $enrollment->student_id = Auth::user()->student->id;
                $enrollment->status = 'pending';
                $enrollment->save();
            }
            DB::commit();
            $url = $this->processWithVnpay($order, $request->payment_method);
            return redirect($url);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['message' => 'Thanh toán thất bại!', 'icon' => 'error']);
        }
    }
    private function processWithVnpay(Order $order, string $method): string
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TxnRef = $order->id; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $order->total_price; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $method; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNPAY_TMNCODE'),
            "vnp_Amount" => (string)($vnp_Amount * 100),
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD: $vnp_TxnRef",
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => env('VNP_RETURNURL'),
            "vnp_TxnRef" => (string)$vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        $vnpSecureHash = hash_hmac('sha512', $hashdata, env('VNPAY_HASHSECRET'));//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url;
    }
    public function vnpayCallback(Request $request): RedirectResponse
    {
        $hashMap = [
            '00' => 'Giao dịch thành công',
            '07' => 'Trừ tiền thành công. Giao dịch bị nghi ngờ (liên quan tới lừa đảo, giao dịch bất thường).',
            '09' => 'Thẻ/Tài khoản của khách hàng chưa đăng ký dịch vụ InternetBanking tại ngân hàng.',
            '10' => 'Khách hàng xác thực thông tin thẻ/tài khoản không đúng quá 3 lần',
            '11' => 'Đã hết hạn chờ thanh toán. Xin quý khách vui lòng thực hiện lại giao dịch.',
            '12' => 'Thẻ/Tài khoản của khách hàng bị khóa',
            '13' => 'Quý khách nhập sai mật khẩu xác thực giao dịch (OTP).',
            '24' => 'Khách hàng hủy giao dịch',
            '51' => 'Số tiền không đủ để thanh toán',
            '65' => 'Tài khoản của Quý khách đã vượt quá hạn mức giao dịch trong ngày.',
            '75' => 'Ngân hàng thanh toán đang bảo trì.',
            '79' => 'Khách hàng nhập sai mật khẩu thanh toán quá số lần quy định.',
            '99' => 'Lỗi không xác định'
            ];

        $orderId = $request->get('vnp_TxnRef');

        $order = Order::find($orderId);
        $code = $request->get('vnp_ResponseCode');
        if($code !== "00"){
            $order->status = $hashMap[$code];
            $order->save();
            foreach ($order->enrollments as $enrollment){
                $enrollment->status = 'failed';
                $enrollment->save();
            }
            return redirect()->route('client.home')->with(['message' => $hashMap[$code], 'icon' => 'error']);
        } else {
            foreach ($order->enrollments as $enrollment){
                $enrollment->status = 'paid';
                $enrollment->save();
            }

            //Update order status
            $order->status = 'paid';
            $order->save();
            session()->forget('cart');
            return redirect()->route('client.home')->with(['message' => 'Thanh toán thành công!', 'icon' => 'success']);
        }
    }
}
