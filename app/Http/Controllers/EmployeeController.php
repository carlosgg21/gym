<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Township;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(['township','business','type'])->where('enabled',1)->paginate(5);
    //       return $employees;
    //   $employees = Employee::where('enabled',1)->paginate(5);
      return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all()->pluck("name","id");
        $types = EmployeeType::all()->pluck("type","id");
        return view('employee.create')
                     ->with('provinces',$provinces)
                     ->with('types',$types);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->all());

        return redirect()->route('employees.index')
                         ->with('success', __('messages.create_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        // return $employee;
        $provinces = Province::all()->pluck("name","id");
        $types = EmployeeType::all()->pluck("type","id");
        // foreach ($types as $key => $value) {
        //     return $key;
        // }
    //    return $types;
        return view('employee.edit')
                     ->with('employee',$employee)
                     ->with('provinces',$provinces)
                     ->with('types',$types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()
                ->route('employees.index')
                ->with('success',__('messages.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {


    }
}
