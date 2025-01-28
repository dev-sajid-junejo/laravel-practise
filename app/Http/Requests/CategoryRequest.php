<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set this to true if all users are authorized, or add logic for specific authorization.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $this->category, // For updates, `$this->category` is the category being edited
            'description' => 'required|string',
            'status' => 'required|boolean',
            'popular' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'meta_title' => 'nullable|string|max:255',
            'meta_descrip' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ];
    }

    /**
     * Custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'slug.required' => 'The category slug is required.',
            'slug.unique' => 'The slug must be unique.',
            'status.required' => 'The status field is required.',
            'popular.required' => 'The popular field is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image size must not exceed 2 MB.',
        ];
    }
}
