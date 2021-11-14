<?php

namespace App\Http\Controllers;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;

class PaymentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = PaymentTypes::paginate(5);
        return view('payment-type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentTypeRequest $request)
    {
        PaymentTypes::create($request->all());

        return redirect()->route('payment-types.index')
            ->with('success', __('messages.create_successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentTypes  $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type =  PaymentTypes::find($id);
        return view('payment-type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentTypes  $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paymentType =  PaymentTypes::find($id);

        $this->validate(
            $request,
            [

                'name'  => 'required|unique:payment_types,name,' . $paymentType->id,
                'mount' => 'required',
                'day'   => 'required'
            ],
            [
                'name.required'  => 'Campo :attribute es obligatorio',
                'name.unique'    => 'Campo :attribute esta en uso',
                'mount.required' => 'Campo :attribute es obligatorio',
                'day.required'   => 'Campo :attribute es obligatorio'
            ],
            [
                'name'  => 'Tipo de Pago',
                'mount' => 'Monto ',
                'day'   => 'Días'
            ]
        );

        $paymentType->update($request->all());
        return redirect()
            ->route('payment-types.index')
            ->with('success', __('messages.update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentTypes  $paymentTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentTypes $paymentTypes)
    {
        //
    }

    public function getMount($id)
    {
        $mount = PaymentTypes::where('id', $id)->pluck("mount");
        return  response()->json($mount, 200);
    }
}
