<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
class Offer extends Model
{   protected $connection='mongodb';
    protected $table = 'car_offer';
    protected $fillable=[
      'price',
      'manufacturer',
      'model',
      'type',
      'images',
      'version',
      'status',
      'author',
      'description',
      'equipment',
      'localization',
      'repairs',
    ];

    public function getAuthor(){
        return User::find($this->author);
    }


    use HasFactory;
}
