<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreBlogRequest extends FormRequest
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
                'blog_title' => 'required|string|max:255',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'blog_content' => 'required|string',
                'blog_summary' => 'required|string',
            ];
        }

        public function messages(): array
        {
            return [
                'blog_title.required' => 'Tiêu đề không được để trống',
                'blog_title.string' => 'Tiêu đề phải là chuỗi',
                'blog_title.max' => 'Tiêu đề không được quá 255 ký tự',
                'thumbnail.required' => 'Ảnh đại diện không được để trống',
                'thumbnail.image' => 'Ảnh đại diện phải là ảnh',
                'thumbnail.mimes' => 'Ảnh đại diện phải thuộc định dạng: jpeg, png, jpg, gif, svg',
                'thumbnail.max' => 'Ảnh đại diện không được quá 2048 KB',
                'blog_content.required' => 'Nội dung không được để trống',
                'blog_content.string' => 'Nội dung phải là chuỗi',
                'blog_summary.required' => 'Tóm tắt không được để trống',
                'blog_summary.string' => 'Tóm tắt phải là chuỗi',
            ];
        }
    }
