<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'ci' => 'required|unique:employees',
            'name' => 'required',
            'last_name' => 'required',

            'hiring_date' => 'required',
            'type_id' => 'required'
        ];
    }

      /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ci.required' => 'Campo :attribute es obligatorio',
            'ci.unique' => 'Campo :attribute esta en uso',
            'name.required' => 'Campo :attribute es obligatorio',
            'last_name.required' => 'Campo :attribute es obligatorio',

            'hiring_date.required' => 'Campo :attribute es obligatorio',
            'type_id.required' => 'Campo :attribute es obligatorio',
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'ci' => 'Identificación',
            'name' => 'Nombre',
            'last_name' => 'Apellidos',

            'hiring_date' => 'Fecha de contratación',
            'type_id' => 'Ocupaición',
        ];
    }
}
