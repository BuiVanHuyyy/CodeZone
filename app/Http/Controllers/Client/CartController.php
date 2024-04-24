<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(int|string $id): \Illuminate\Http\JsonResponse
    {
        $course = Course::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$course->id])) {
            return response()->json(['message' => 'Khóa học đã có trong giỏ hàng rồi  !', 'cart' => $cart, 'type' => 'warning']);
        }
        $cart[$course->id] = [
            'id' => $course->id,
            'name' => $course->title,
            'price' => $course->price,
            'image' => $course->thumbnail,
        ];
        session()->put('cart', $cart);
        return response()->json(['message' => 'Khóa học đã được thêm vào giỏ hành thành công!', 'cart' => $cart, 'type' => 'success']);
    }
    public function removeFromCart(int|string $id): \Illuminate\Http\JsonResponse
    {
        $course = Course::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$course->id])) {
            unset($cart[$course->id]);
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Course removed from cart successfully!', 'totalItem' => count($cart)]);
    }
    public function placeOrder(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $cart = session()->get('cart', []);
            if (count($cart) === 0) {
                return response()->json(['message' => 'Giỏ hàng trống!', 'type' => 'warning']);
            }
            $order = new Order();
            $order->student_id = Auth::user()->students->id;
            $order->total_price = collect($cart)->sum('price');
            $order->payment_method = $request->payment_method;
            $order->status = 'pending';
            $order->save();
            foreach ($cart as $id => $item) {
                $enrollment = new Enrollment();
                $enrollment->order_id = $order->id;
                $enrollment->course_id = $id;
                $enrollment->price = $item['price'];
                $enrollment->student_id = Auth::user()->students->id;
                $enrollment->status = 'pending';
                $enrollment->save();
            }
            DB::commit();
            $url = $this->processWithVnpay($order, $request->payment_method);
            return redirect($url);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage(), 'type' => 'error']);
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
    public function vnpayCallback(Request $request): \Illuminate\Http\RedirectResponse
    {
//        $hashMap = [
//            '00' => 'Giao dịch thành công',
//            '07' => 'Trừ tiền thành công. Giao dịch bị nghi ngờ (liên quan tới lừa đảo, giao dịch bất thường).',
//            '09' => 'Giao dịch không thành công do: Thẻ/Tài khoản của khách hàng chưa đăng ký dịch vụ InternetBanking tại ngân hàng.',
//            '10' => 'Giao dịch không thành công do: Khách hàng xác thực thông tin thẻ/tài khoản không đúng quá 3 lần'
//        ];

        $orderId = $request->get('vnp_TxnRef');

        $order = Order::find($orderId);

        if($request->get('vnp_ResponseCode') !== "00"){
            $order->status = 'failed';
            $order->save();
            foreach ($order->enrollments as $enrollment){
                $enrollment->status = 'failed';
                $enrollment->save();
            }
        }
        foreach ($order->enrollments as $enrollment){
            $enrollment->status = 'paid';
            $enrollment->save();
        }

        //Update order status
        $order->status = 'paid';
        $order->save();
        session()->forget('cart');
        session()->flash('message', 'Thanh toán thành công!');
        return redirect()->route('client.home');
    }
}
