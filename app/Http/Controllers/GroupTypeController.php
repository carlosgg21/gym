<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroupTypesRequest;

class GroupTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = GroupType::where('enabled', '1')->orderBy('type', 'asc')->paginate(5);
        return view('group-type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupTypesRequest $request)
    {

        GroupType::create($request->all());
        return redirect()->route('group-types.index')
            ->with('success', __('messages.create_successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupType $groupType)
    {

        return view('group-type.edit', compact('groupType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupType $groupType)
    {

        $this->validate(
            $request,
            [

                'type'  => 'required|unique:group_types,type,' . $groupType->id,

            ],
            [
                'type.required'  => 'Campo :attribute es obligatorio',
                'type.unique'    => 'Campo :attribute esta en uso'
            ],
            [
                'type'  => 'Tipo de Grupo',

            ]
        );

        $groupType->update($request->all());
        return redirect()
            ->route('group-types.index')
            ->with('success', __('messages.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupType $groupType)
    {
        $groupType->enabled = 0;
        $groupType->save();
        return redirect()
            ->route('group-types.index')
            ->with('success', __('Se ha eliminado el tipo de grupo'));
    }
}
