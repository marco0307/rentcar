<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
            'full_name'=>'required|max:190',
            'email'=>'required|string|email|max:190|unique:users',
            'cedula'=>'required|numeric|unique:users',
            'tanda'=>'required',
            'comision'=>'required|max:190',
            'fecha_ingreso'=>'required|date',
            'role'=>'required',
        ];
    }
}
