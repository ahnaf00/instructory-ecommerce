<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'updateProductCategory'         =>   'required|numeric',
            'updateProductName'             =>   'required|string|max:255',
            'updateProductPrice'            =>   'required|numeric|min:0',
            'updateProductCode'             =>   'nullable|string',
            'updateProductStock'            =>   'required|numeric|min:1',
            'updateProductQuantity'                =>   'required|numeric|min:1',
            'updateShortDescription'        =>   'nullable|string',
            'updateLongDescription'         =>   'nullable|string',
            'updateAdditionalInfo'          =>   'nullable|string',
            // 'ratings'                    =>   'nullable',
            'updateProductStatus'           =>   'required|boolean',
            'updateProductImage'            =>   'nullable'
        ];
    }
}
