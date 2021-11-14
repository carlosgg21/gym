<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $attributes = ['business_id' => 1];
    protected $fillable = [
                            'full_name',
                            'cellphone',
                            'phone',
                            'email',
                            'business_id'
                             ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
