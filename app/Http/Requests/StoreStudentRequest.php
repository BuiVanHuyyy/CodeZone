<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:2',
            'nickname' => 'string|max:255|min:2|nullable',
            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|nullable',
            'dob' => 'date|nullable|before_or_equal:today',
            'bio' => 'string|max:255|min:2|nullable',
            'facebook' =>'url|regex:/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i|nullable',
            'linkedin' => 'url|regex:/^https:\/\/(www\.)?linkedin\.com\/.+$/i|nullable',
            'github' => 'url|regex:/^https:\/\/(www\.)?github\.com\/.+$/i|nullable',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.string' => 'Tên phải là chuỗi',
            'name.max' => 'Tên không được quá 255 ký tự',
            'name.min' => 'Tên không được dưới 2 ký tự',
            'nickname.string' => 'Biệt danh phải là chuỗi',
            'nickname.max' => 'Biệt danh không được quá 255 ký tự',
            'nickname.min' => 'Biệt danh không được dưới 2 ký',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.regex' => 'Số điện thoại không hợp lệ',
            'phone_number.min' => 'Số điện thoại không được dưới 10 ký tự',
            'bio.string' => 'Bio phải là chuỗi',
            'bio.max' => 'Bio không được quá 255 ký tự',
            'bio.min' => 'Bio không được dưới 2 ký tự',
            'facebook.url' => 'Facebook không hợp lệ',
            'facebook.regex' => 'Facebook không hợp lệ',
            'linkedin.url' => 'Linkedin không hợp lệ',
            'linkedin.regex' => 'Linkedin không hợp lệ',
            'github.url' => 'Github không hợp lệ',
            'github.regex' => 'Github không hợp lệ',
            'dob.date' => 'Ngày sinh không hợp lệ',
            'dob.before_or_equal' => 'Ngày sinh không được lớn hơn ngày hiện tại',
        ];
    }
}
