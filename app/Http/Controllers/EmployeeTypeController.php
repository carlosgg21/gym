<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeTypeRequest;
use App\Http\Requests\UpdateEmployeeTypeRequest;

class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types =  EmployeeType::paginate(5);
        return view('employee-type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeTypeRequest $request)
    {
        EmployeeType::create($request->all());

        return redirect()->route('types.index')
            ->with('success', __('messages.create_successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeType =  EmployeeType::find($id);
        return view('employee-type.edit', compact('employeeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employeeType =  EmployeeType::find($id);


        $this->validate(
            $request,
            [
                'type' => 'required|unique:employee_types,type,' . $employeeType->id
            ],
            [
                'type.required' => 'Campo :attribute es obligatorio',
                'type.unique' => 'Campo :attribute esta en uso'
            ],
            [
                'type' => 'Tipo de Empleado'
            ]
        );


        $employeeType->update($request->all());
        return redirect()
            ->route('types.index')
            ->with('success', __('messages.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeType $employeeType)
    {
        return redirect()
            ->route('types.index')
            ->with('success', __('Esta versión no permite eliminar contenido'));
    }
}
