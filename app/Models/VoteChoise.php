<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteChoise extends Model
{
    protected $table = 'vote_choises';
    use HasFactory;

    public function poll(){
        return $this->belongsTo('App\Models\Poll');
    }

    public function votes(){
        return $this->hasMany('App\Vote');
    }
}
