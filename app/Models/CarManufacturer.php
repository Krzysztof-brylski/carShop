<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarManufacturer extends Model
{
    protected $connection='mysql';
    protected $table='car_manufacturer';
    protected $fillable=[
        'id',
        'name'
    ];

    public function carModels(){
        return $this->hasMany(CarModel::class);
    }
    use HasFactory;
}
