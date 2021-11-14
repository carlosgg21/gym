<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
