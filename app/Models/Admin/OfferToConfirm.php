<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model;

class OfferToConfirm extends Model{

    protected $connection='mongodb';
    protected $table = 'car_offer';

    protected $fillable=[
        'Offer_id'
    ];

    /**
     *
     * @return mixed
     */
    public function getOffer(){
        return Offer::find($this->Offer_id)->first();
    }

    /**
     * @throws \Throwable
     */
    public function confirmOffer(){
        DB::connection("mongodb")->transaction(function (){
            $this->getOffer()->status="active";
            $this->delete();
        });
    }

    use HasFactory;
}
