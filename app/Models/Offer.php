<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
class Offer extends Model
{

    protected $fillable=[
      'price',
      'manufacturer',
      'model',
      'version',
      'status',
      'author',
      'description',
      'equipment',
      'localization',
      'repairs',
    ];
    use HasFactory;
}
