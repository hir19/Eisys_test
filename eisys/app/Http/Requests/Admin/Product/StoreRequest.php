<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'string|required',
            'quantity' => 'numeric|required',
            'price' => 'numeric|required',
            'category_id' => 'exists:categories,id|required',
            'brand_id' => 'exists:brands,id|required',
            // 'tag_ids' => 'array',
            // 'tag_ids.*' => 'exists:tags,id|distinct',
            'description' => 'string|nullable',
        ];
    }

}
