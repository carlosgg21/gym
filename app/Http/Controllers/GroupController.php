<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupType;
use App\Models\Employee;
use App\Models\Customer;
use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests\StoreGroupRequest;

class GroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with(['groupType', 'employees','customers'])->where('enabled', '1')->paginate(5);
        return  view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = GroupType::all()->pluck("type", "id");
        $trainers = Employee::where('type_id', '1')->get(['id', 'name', 'last_name']);
        $customers = Customer::where('enabled', 1)->get(['id','ci','name','last_name','member']);
        //return $customers;
        return view('group.create', compact('types', 'trainers','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreGroupRequest $request)
    {
return $request;
        $trainers = $request->employee_id;
        $customers = $request->customer_id;

        $new_frecuency = implode(",", $request->frecuency);
        $request->request->remove('frecuency');
        $request->request->add(['frecuency' => $new_frecuency]);

        $request->request->remove('employee_id');
        $request->request->remove('customer_id');

        $group =  Group::create($request->all());

        $group->employees()->attach($trainers);
        $group->customers()->attach($customers);
        return redirect()->route('groups.index')
            ->with('success', __('messages.create_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $data = Group::with(['groupType', 'employees','customers'])
                        ->where('enabled', '1')
                        ->where('id', $group->id)
                        ->first();

                        // return $data;

        return  view('group.student-list',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $trainers = Employee::where('type_id', '1')->get(['id', 'name', 'last_name']);
        $customers = Customer::where('enabled', 1)->get(['id','ci','name','last_name','member']);
        $types = GroupType::all()->pluck("type", "id");
        $employees = Group::find($group->id)->employees()->pluck("employees.id")->toArray();
        $students = Group::find($group->id)->customers()->pluck("customers.id")->toArray();


        return view('group.edit')
            ->with('employees', $employees)
            ->with('group', $group)
            ->with('trainers', $trainers)
            ->with('customers', $customers)
            ->with('students', $students)
            ->with('types', $types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $trainers = $request->employee_id;
        $customers = $request->customer_id;

        $new_frecuency = implode(",", $request->frecuency);
        $request->request->remove('frecuency');
        $request->request->add(['frecuency' => $new_frecuency]);

        $request->request->remove('employee_id');
        $request->request->remove('customer_id');

        $group->update($request->all());
        $group->employees()->sync($trainers);
        $group->customers()->sync($customers);

        return redirect()
            ->route('groups.index')
            ->with('success', __('messages.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->enabled = 0;
        $group->save();
        return redirect()
            ->route('groups.index')
            ->with('success', __('Se ha eliminado el grupo'));
    }



}
