<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_first',
        'name_last',
        'email',
        'password',
        'student_number',
        'type',
    ];
// $miu = User::create(['name_first'=>'sahar','name_last'=>'sadri','email'=>'sahar@mio.com','password'=>'123321123','student_number'=>'961845125','type'=>1]);
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    public function votes(){
        return $this->hasMany('App\Models\Vote');
    }
}
