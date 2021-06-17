<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function votechoises(){
        return $this->hasMany('App\VoteChoise');
    }

}
