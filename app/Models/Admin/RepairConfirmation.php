<?php

namespace App\Models\Admin;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RepairConfirmation extends Model
{
    use HasFactory;
    protected $table="repair_confirmation";
    protected $fillable=[
        'offer_id'
    ];
    public function getOffer(){
        return Offer::find(['id'=>$this->offer_id])->first();
    }
    public function confirm(){
        DB::transaction(function (){
            Offer::find($this->offer_id)->confirm();
            $this->delete();
        });
    }
    public function reject(){
        //todo send message to author about reject
    }

}
