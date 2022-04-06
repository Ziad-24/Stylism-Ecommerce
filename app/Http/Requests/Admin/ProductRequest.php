<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required' , 'unique:products,name'],
            'price' => ['required' , 'numeric'],
            'details' => ['required' , 'max:160'],
            'img' => ['required'],
            'category_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.unique' => 'Product name already exists',
            'name.max' => 'Product name length is over the limit "160 letter"',
            'price.required' => 'Price is required',
            'price.numeric' => 'Enter a numeric value',
            'details.required' => 'Required details',
            'category_id.required' => 'Category is required',
            'img.required' => 'Image is required',
        ];
    }
}
