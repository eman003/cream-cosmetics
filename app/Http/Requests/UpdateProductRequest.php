<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'product_type_id' => 'required|integer|not_in:0',
            'url' => 'required|url',
            'status_id' => 'required|integer|not_in:0',
            //'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
