<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Customer extends Model
{
    use HasFactory;
    protected $attributes = ['business_id' => 1];
    protected $fillable = [
        'ci',
        'name',
        'last_name',
        'sex',
        'enabled',
        'age',
        'cellphone',
        'phone',
        'email',
        'address',
        'member',
        'hiring_date',
        'discharge_date',
        'discharge_reason',
        'payment_type_id',
        'business_id',
        'township_id'
    ];

    public function paymentType()
    {
        return $this->belongsTo(PaymentTypes::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public static function registerPayment($customerId)
    {
    }

    public static function getCustomers()
    {
        $customers = Customer::with(['business', 'paymentType'])->where('enabled', 1)->paginate(5);
        $data = Customer::dueDate($customers);
        return $data;
    }

    public static function dueDate($data)
    {
        $today = Carbon::now();
        foreach ($data as  $value) {
            $customerHd     = $value->hiring_date; //obtengo la fecha de alta de cada cliente del arreglo
            $cantPaymentDay = $value->paymentType->day; //obtengo la cantidad de dias asociadas la tipo de pago del cliente
            //primera fecha de vencimiento del pago
            $dueDate = Carbon::parse($customerHd)->addDays($cantPaymentDay);
            //mietras que la fecha de vencimiento sea menor o igual a la fecha actual
            while ($dueDate->lte($today)) {
                $dueDate = Carbon::parse($dueDate)->addDays($cantPaymentDay); //sumo la cantidad de dias, para obtener la fecha real del proximo vencimiento
            }
            $date_dif = $dueDate->diffInDays($today);
            if ($date_dif <= 3) { //sie es igual o menor a 3
                $value['soon_expiration'] =  1; //esta proximo a vencmiento
            } else {
                $value['soon_expiration'] =  0; //no esta proximo a vencimeinto
            }
            $value['date_dif'] =  $date_dif;
            $value['due_day'] = $dueDate->format('Y-m-d');
        }
        return $data;
    }
}
