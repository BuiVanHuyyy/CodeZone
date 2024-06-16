<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'current_password.required' => 'Mật khẩu cũ không được để trống',
            'password.required' => 'Mật khẩu mới không được để trống',
            'password.confirmed' => 'Mật khẩu mới không trùng khớp',
            'password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
            'password_confirmation.required' => 'Mật khẩu xác nhận không được để trống'
        ];
    }
}
