<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'rating' => 'required|numeric|min:1|max:5',
            'review_content' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'rating.required' => 'Vui lòng chọn số sao',
            'rating.numeric' => 'Số sao phải là số',
            'rating.min' => 'Số sao phải lớn hơn hoặc bằng 1',
            'rating.max' => 'Số sao phải nhỏ hơn hoặc bằng 5',
            'review_content.required' => 'Vui lòng nhập nội dung đánh giá',
        ];
    }
}
