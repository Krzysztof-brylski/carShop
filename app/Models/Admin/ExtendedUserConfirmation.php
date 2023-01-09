<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExtendedUserConfirmation extends Model
{
    use HasFactory;
    protected $table="extended_user_confirmation";

    protected $fillable=[
        'user_id'
    ];
    public function getUser(){
        return User::find(['id'=>$this->user_id])->first();
    }
    public function confirm(){
        DB::transaction(function (){
            User::find($this->user_id)->confirm();
            $this->delete();
        });
    }
    public function reject(){
        //todo send message to author about reject
    }

}
