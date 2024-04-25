<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpseclib3\Crypt\Hash;

class InstructorController extends Controller
{
    public function store(StoreInstructorRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Illuminate\Support\Facades\Hash::make('my-secret-password');
            $user->role = 'instructor';
            $user->save();
            $instructor = new Instructor();
            $instructor->user_id = $user->id;
            $instructor->name = $request->name;
            $instructor->slug = Str::slug($request->name);
            $instructor->phone_number = $request->phone;
            $instructor->bio = $request->bio;
            $instructor->cv_upload = $this->saveCvToSystem($request->cv);
            $instructor->save();
            DB::commit();
            return redirect()->back()->with('msg', 'Chúng tôi đã nhận được yều cầu của bạn chúng tôi sẽ phản hồi sớm nhất có thể')->with('i', 'success');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('msg', 'Register failed')->with('i', 'error');
        }
    }
    private function saveCvToSystem(UploadedFile $file): string
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('client_assets/cv_instructor'), $fileName);
        return '/client_assets/cv_instructor/' . $fileName;
    }
}
