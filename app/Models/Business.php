<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'acronym',
        'slogan',
        'email',
        'phone',
        'web_site',
        'address'
         ];

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    // public function image()
    // {
    //     return $this->morphOne(Image::class,'imageable');

    // }

}
