<?php

use App\Models\Business;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\BusinessController;
use  App\Http\Controllers\EmployeeTypeController;
use  App\Http\Controllers\OwnerController;
use  App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentTypesController;
use App\Http\Controllers\GroupTypeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CustomerGroup;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('businesses', BusinessController::class);
    Route::resource('types', EmployeeTypeController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('payment-types', PaymentTypesController::class);
    Route::get('customers/member', [CustomerController::class, 'member'])->name('customers.member');
    Route::get('customers/unsubscribe', [CustomerController::class, 'unsubscribe'])->name('customers.unsubscribe');
    Route::get('customers/show_unsubscribe', [CustomerController::class, 'show_unsubscribe'])->name('customers.show_unsubscribe');
    Route::get('customers/subscribe', [CustomerController::class, 'subscribe'])->name('customers.subscribe');
    Route::resource('customers', CustomerController::class);
    Route::get('towns/{id}', [TownshipController::class, 'getTownByProvince']);
    Route::get('mount/{id}', [PaymentTypesController::class, 'getMount'])->name('payment-types.mount');
    Route::resource('group-types', GroupTypeController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('group-customers', CustomerGroup::class);
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
