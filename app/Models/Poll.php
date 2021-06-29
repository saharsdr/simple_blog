<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable=[
        'is_active',
        'description',
        'title',
        'post_id',
        'time_to_end'
        
    ];


    public function post(){
        return $this->belongsTo('App\Models\Post');
    }

    public function votechoises(){
        return $this->hasMany('App\Models\VoteChoise');
    }

}
