<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'course_title' => 'required|string|max:50|min:5',
            'description' => 'required|string|max:255|min:5',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subjects' => 'required|array',
            'subjects.*.name' => 'required|string',
            'subjects.*.lessons.*.name' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
          'course_title.required' => 'Vui lòng nhập tiêu đề khóa học',
            'course_title.string' => 'Tiêu đề khóa học phải là chuỗi',
            'course_title.max' => 'Tiêu đề khóa học không được vượt quá 50 ký tự',
            'course_title.min' => 'Tiêu đề khóa học không được ít hơn 5 ký tự',
            'description.required' => 'Vui lòng nhập mô tả khóa học',
            'description.string' => 'Mô tả khóa học phải là chuỗi',
            'description.max' => 'Mô tả khóa học không được vượt quá 255 ký tự',
            'description.min' => 'Mô tả khóa học không được ít hơn 5 ký tự',
            'price.required' => 'Vui lòng nhập giá khóa học',
            'price.numeric' => 'Giá khóa học phải là số',
            'price.min' => 'Giá khóa học không được nhỏ hơn 0',
            'category.required' => 'Vui lòng chọn danh mục khóa học',
            'thumbnail.required' => 'Vui lòng chọn ảnh đại diện cho khóa học',
            'thumbnail.image' => 'Ảnh đại diện cho khóa học phải là ảnh',
            'thumbnail.mimes' => 'Ảnh đại diện cho khóa học phải có định dạng jpeg, png, jpg, gif, svg',
            'thumbnail.max' => 'Ảnh đại diện cho khóa học không được vượt quá 2048 ký tự',
            'subject-name.required' => 'Vui lòng nhập tên chủ đề',
            'subject-name.string' => 'Tên chủ đề phải là chuỗi',
            'lesson-name.required' => 'Vui lòng nhập tên bài học',
            'lesson-name.string' => 'Tên bài học phải là chuỗi',
            'content.required' => 'Vui lòng nhập nội dung bài học',
            'subjects.required' => 'Vui lòng nhập môn học',
            'subjects.*.name.required' => 'Vui lòng nhập tên môn học',
            'subjects.*.name.string' => 'Tên môn học phải là chuỗi',
            'subjects.*.lessons.required' => 'Vui lòng nhập bài học',
            'subjects.*.lessons.*.name.required' => 'Vui lòng nhập tên bài học',
            'subjects.*.lessons.*.name.string' => 'Tên bài học phải là chuỗi',
            'subjects.*.lessons.*.content.required' => 'Vui lòng nhập nội dung bài học',
        ];
    }
}
