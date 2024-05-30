<?php

namespace App\Http\Requests\FeaturedProduct;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeaturedProductRequest extends FormRequest
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
            'header' => ['required', 'max:1000'],
            'subheader' =>  ['required', 'max:1000'],
            'content' => 'array',
            'title' => 'string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required|string',
        ];
    }

    
}
