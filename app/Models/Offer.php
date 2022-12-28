<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
class Offer extends Model
{   protected $connection='mongodb';
    protected $table = 'car_offer';
    protected $fillable=[
        'status',
        'type',
        'author',
        'details',
        'carInfo',
        'price',
        'description',
        'localization',
        'images'
    ];

    public function getAuthor(){
        return User::find($this->author['id']);
    }


    use HasFactory;
}
