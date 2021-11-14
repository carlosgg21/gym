<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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

        // $todayDate = date('m/d/Y');
        return [
            'employee_id'      => 'required|array|min:1',
            'employee_id.*'      => 'required|string|distinct|min:1',

            'start_date' => 'required|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
            'start'      => 'required|date_format:H:i',
            'end'        => 'required|date_format:H:i|after:start',

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
            'employee_id.required' => 'Campo :attribute es obligatorio',
            'start_date.required' => 'Campo :attribute es obligatorio',
            'start_date.after_or_equal' => 'Campo :attribute debe ser mayor o igual a la fecha actual',
            'start.required' => 'Campo :attribute es obligatorio',
            'end.required' => 'Campo :attribute es obligatorio',
            'end.after' => 'Campo :attribute debe ser mayor que Hora Inicio',

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
            'employee_id' => 'Empleado',
            'start_date' => 'Fecha de Comiezo',
            'start' => 'Hora de Incio',
            'end' => 'Hora Fin',

        ];
    }
}
