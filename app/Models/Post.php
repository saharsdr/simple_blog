<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function poll(){
        return $this->hasOne('App\Poll');
    }

    public function article(){
        return $this->hasOne('App\Article');
    }

    public function group(){
        return $this->belongsTo('App\Group', 'group_id', 'year');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
