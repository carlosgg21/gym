<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'enabled'
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
