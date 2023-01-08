<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportConfirmation extends Model
{
    use HasFactory;
    protected $table="report_confirmation";
    protected $fillable=[
        'user_id',
        'content'
    ];
    public function getUser(){
        return User::find(['id'=>$this->user_id])->first();
    }
    public function confirm(){
        DB::transaction(function (){
            User::find($this->user_id)->ban();
            $this->delete();
        });
    }
    public function reject(){
        //todo send message to author about reject
    }


}
