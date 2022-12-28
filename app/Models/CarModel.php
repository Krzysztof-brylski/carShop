<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $connection='mysql';
    protected $table='car_model';
    protected $fillable=[
        'id',
        'car_manufacturer_id',
        'name'
    ];
    public function Manufacturer(){
        return $this->belongsTo(CarManufacturer::class);
    }
    public function Version(){
        return $this->hasMany(CarVersion::class);
    }

    use HasFactory;
}
