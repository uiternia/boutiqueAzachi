<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
                'name' => ['required', 'string', 'max:50'],
                'information' => ['required', 'string', 'max:1000'],
                'price' => ['required','integer'],
                'sort_order' => ['nullable','integer'],
                'quantity1' => ['nullable','integer','between:0,99'],
                'quantity2' => ['nullable','integer','between:0,99'],
                'quantity3' => ['nullable','integer','between:0,99'],
                'quantity4' => ['nullable','integer','between:0,99'],
                'shop_id' => ['required','exists:shops,id'],
                'category' => ['required','exists:item_categories,id'],
                'image1' => ['nullable','exists:images,id'],
                'image2' => ['nullable','exists:images,id'],
                'image3' => ['nullable','exists:images,id'],
                'image4' => ['nullable','exists:images,id'],
                'is_selling' => ['required','boolean']
        ];
    }
}
