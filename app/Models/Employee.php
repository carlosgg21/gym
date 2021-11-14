<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $attributes = ['business_id' => 1];
    protected $fillable = [
        'ci',
        'name',
        'last_name',
        'enabled',
        'cellphone',
        'phone',
        'email',
        'address',
        'observations',
        'hiring_date',
        'discharge_date',
        'discharge_reason',
        'type_id',
        'business_id',
        'township_id'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }
    public function type()
    {
        return $this->belongsTo(EmployeeType::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
