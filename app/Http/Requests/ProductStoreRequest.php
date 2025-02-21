<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'productCategory'      =>   'required|numeric',
            'productName'          =>   'required|string|max:255',
            'productPrice'         =>   'required|numeric|min:0',
            'productCode'          =>   'required|string|unique:products,product_code',
            'productStock'         =>   'required|numeric|min:1',
            'quantity'             =>   'required|numeric|min:1',
            'shortDescription'     =>   'nullable|string',
            'longDescription'      =>   'nullable|string',
            'additionalInfo'       =>   'nullable|string',
            // 'ratings'              =>   'nullable',
            'productStatus'        =>   'required|boolean',
            'productImage'         =>   'required'
        ];
    }
}
