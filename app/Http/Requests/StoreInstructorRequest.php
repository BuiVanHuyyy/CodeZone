<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'bio' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.string' => 'Tên phải là chuỗi',
            'name.max' => 'Tên không được vượt quá 255 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được vượt quá 255 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.string' => 'Số điện thoại phải là chuỗi',
            'phone.max' => 'Số điện thoại không được vượt quá 255 ký tự',
            'cv.required' => 'Vui lòng chọn CV',
            'cv.file' => 'CV phải là file',
            'cv.mimes' => 'CV phải có định dạng pdf',
            'cv.max' => 'CV không được vượt quá 2048 KB',
            'bio.required' => 'Vui lòng nhập giới thiệu',
        ];
    }
}
