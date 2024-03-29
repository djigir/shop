<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'is_published' => 'nullable|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|required|exists:tags,id',
            'colors' => 'nullable|array',
            'colors.*' => 'nullable|integer|required|exists:colors,id',
            'product_images' => 'nullable|array',
            'group_id' => 'nullable',
        ];
    }
}
