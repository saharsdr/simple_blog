<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function poll(){
        return $this->hasOne('App\Models\Poll');
    }

    public function article(){
        return $this->hasOne('App\Models\Article');
    }

    public function group(){
        return $this->belongsTo('App\Models\Group', 'group_id', 'year');
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
