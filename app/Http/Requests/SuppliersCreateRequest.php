<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersCreateRequest extends FormRequest
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
            'name' => 'required',
            'cui' => 'required',
            'reg_com' => 'required',
            'address' => 'required',
            'supplier_code' => 'required',
            'contact_name' => 'required',
            'contact_position' => 'required',
            'contact_tel' => 'required',
            'contact_email' => 'required',
            'due_date' => 'required',
        ];
    }
}
