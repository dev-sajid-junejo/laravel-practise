<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to access this request
    }

    public function rules()
    {
        return [
            'cate_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'small_description' => 'required|string|max:500',
            'description' => 'required|string',
            'original_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0|lt:original_price',
            'tax' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'cate_id.required' => 'Category is required.',
            'name.required' => 'Product name is required.',
            'slug.unique' => 'The slug must be unique.',
            'selling_price.lt' => 'Selling price must be less than the original price.',
        ];
    }
}
