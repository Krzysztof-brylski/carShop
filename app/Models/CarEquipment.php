<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEquipment extends Model
{
    protected $connection='mysql';
    protected $table="car_equipment";
    protected $fillable=[
        'name'
    ];

    use HasFactory;
}
