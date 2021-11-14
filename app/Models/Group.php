<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'start', 'end', 'frecuency', 'enabled', 'group_type_id','employee_id','customer_id'];

    public function groupType()
    {
        return $this->hasMany(GroupType::class, 'id', 'group_type_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
