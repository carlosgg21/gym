<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Group;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = array(
                'customers' => Customer::whereEnabled('1')->count(),
                'employees' => Employee::whereEnabled('1')->count(),
                'groups'    => Group::whereEnabled('1')->count()
        );

        return view('home',compact('data'));
    }
}
