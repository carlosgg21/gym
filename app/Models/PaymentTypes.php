<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mount',
        'description',
        'day'
    ];


    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
