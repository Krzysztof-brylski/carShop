<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarVersion extends Model
{
    protected $connection='mysql';
    protected $fillable=[
        'id',
        'Model_id',
        'name'
    ];
    public function Model(){
        $this->belongsTo(CarModel::class);
    }

    use HasFactory;
}
