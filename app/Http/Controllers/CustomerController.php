<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Province;
use App\Models\PaymentTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::getCustomers();
        // return  $customers;
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all()->pluck("name", "id");
        // $paymentTypes = PaymentTypes::all()->pluck("name","id");

        return  view('customer.create')->with('paymentTypes', PaymentTypes::all()->pluck("name", "id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        // $locale = App::currentLocale();
        // return $locale;
        // return $request;
        // $this->validate($request, [
        //     'ci' => 'required|unique:customers|max:255',
        //     'name' => 'required',
        //     'last_name' => 'required',
        // ]);

        Customer::create($request->all());

        return redirect()->route('customers.create')
            ->with('success', __('messages.create_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return "Dasd";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function member(Request $request)
    {


        if (count($request->valor) != 0) {

            $cont =  count($request->valor);
            $values =  $request->valor;

            for ($i = 0; $i < $cont; $i++) {
                $id = $values[$i];

                $customer =  Customer::find($id);
                $customer->member = "si";
                $customer->save();
            }
            session()->flash('success', 'Se han hechos socios los clientes seleccionados');
            $data = collect([
                'status' => "success"
            ]);
        } else {
            session()->flash('error', 'Error No se ha podido hacer socios a los clientes selecionados');
            $data = collect([
                'status' => "error"

            ]);
        }

        return response()->json($data, 200);
    }
    //dar de baja
    public function unsubscribe(Request $request)
    {


        if (count($request->valor) != 0) {

            $cont =  count($request->valor);
            $values =  $request->valor;

            for ($i = 0; $i < $cont; $i++) {
                $id = $values[$i];

                $customer =  Customer::find($id);
                $customer->enabled = '0';
                $customer->discharge_date =  Carbon::now()->toDateTimeString();
                $customer->save();
            }
            session()->flash('success', 'Se han dado de baja a los clientes seleccionados');
            $data = collect([
                'status' => "success"
            ]);
        } else {
            session()->flash('error', 'Error No se ha podido dar de baja a los clientes selecionados');
            $data = collect([
                'status' => "error"

            ]);
        }

        return response()->json($data, 200);
    }
    //registar pago
    public function payment(Request $request)
    {


        if (count($request->valor) != 0) {

            $cont =  count($request->valor);
            $values =  $request->valor;

            for ($i = 0; $i < $cont; $i++) {
                $id = $values[$i];

                $customer =  Customer::find($id);
                $customer->enabled = '0';
                $customer->save();
            }
            session()->flash('success', 'Se ha actualizado la fecha de pago de clientes seleccionados');
            $data = collect([
                'status' => "success"
            ]);
        } else {
            session()->flash('error', 'Error No se ha podido actualizar la fecha de pago de los clientes selecionados');
            $data = collect([
                'status' => "error"

            ]);
        }

        return response()->json($data, 200);
    }

    public function show_unsubscribe(){
        $customers = Customer::with(['business', 'paymentType'])->where('enabled', 0)->paginate(5);
        return view('customer.show-unsubscribe',compact('customers'));
    }

    public function subscribe(Request $request)
    {

        if (count($request->valor) != 0) {

            $cont =  count($request->valor);
            $values =  $request->valor;

            for ($i = 0; $i < $cont; $i++) {
                $id = $values[$i];

                $customer =  Customer::find($id);
                $customer->enabled = '1';
                $customer->discharge_date = null;
                $customer->hiring_date =  Carbon::now()->toDateTimeString();
                $customer->save();
            }
            session()->flash('success', 'Se han dado de alta a los clientes seleccionados');
            $data = collect([
                'status' => "success"
            ]);
        } else {
            session()->flash('error', 'Error No se ha podido dar de alta a los clientes selecionados');
            $data = collect([
                'status' => "error"

            ]);
        }

        return response()->json($data, 200);
    }
}
