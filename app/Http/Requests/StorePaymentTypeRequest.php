<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentTypeRequest extends FormRequest
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
             'name'  => 'required|unique:payment_types',
             'mount' => 'required',
             'day'   => 'required'

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
            'name.required'  => 'Campo :attribute es obligatorio',
            'name.unique'    => 'Campo :attribute esta en uso',
            'mount.required' => 'Campo :attribute es obligatorio',
            'day.required'   => 'Campo :attribute es obligatorio'

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
            'name'  => 'Tipo de Pago ',
            'mount' => 'Monto ',
            'day'   => 'Días'

        ];
    }
}
