<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'vote_choise_id'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function votechoise(){
        return $this->belongsTo('App\Models\VoteChoise');
    }

    
}
