<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsCreateRequest extends FormRequest
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
            //
            'producer_id' => 'required',
            'specie' => 'required',
            'insamantare' => 'required',
            'name' => 'required',
            'categorie_bio' => 'required',
            'category_id' => 'required',
            'descriere' => 'required',
            'um' => 'required',
            'doc_id' => 'required',
        ];
    }
}
