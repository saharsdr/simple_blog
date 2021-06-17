<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteChoise extends Model
{
    protected $table = 'voice_choises';
    use HasFactory;

    public function poll(){
        return $this->belongsTo('App\Poll');
    }

    public function votes(){
        return $this->hasMany('App\Vote');
    }
}
