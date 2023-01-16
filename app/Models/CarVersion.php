<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarVersion extends Model
{
    protected $connection='mysql';
    protected $table='car_version';
    protected $fillable=[
        'id',
        'model_id',
        'name'
    ];
    public function carModel(){
        return $this->belongsTo(CarModel::class);
    }

    use HasFactory;
}
