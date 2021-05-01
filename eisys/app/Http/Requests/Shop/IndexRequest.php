<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'keywords' => 'string|max:200|nullable',
            // 'category_id' => 'exists:categories,id|nullable',
            'price' => 'numeric|nullable',
            // 'tag_ids' => 'array',
            // 'tag_ids.*' => 'exists:tags,id|distinct',
        ];
    }

}
