<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $connection="mysql";

    protected $fillable=[
      'token',
      'userId',
      'status',
      'toPay',
      'paymentFor'
    ];


    public function getUser(){
        return User::find($this->userId)->first();
    }

}
