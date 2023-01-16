<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $connection='mongodb';
    protected $table = 'users';
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'offersCredit',
        'accountType',
        'accountRole',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isBaned(){
        return $this->accountType =="baned";
    }
    public function ban(){
        $this->accountType = "baned";
        $this->save();
    }
    public function unBan(){
        $this->accountType = "standard";
        $this->save();
    }
    public function isAdmin(){
        return $this->accountRole == "admin";
    }
    public function isExtended(){
        return $this->accoutType == "extended";
    }
    public function confirm(){
        //todo change acc type confirmation
    }
}
