<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEquipment extends Model
{
    protected $connection='mysql';
    protected $fillable=[
        'id',
        'name'
    ];

    use HasFactory;
}
