<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['mediumText', 'post_id'];
    protected $guarded = ['id','updated_at','created_at'];

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function methaarticles(){
        return $this->hasMany('App\MethaArticle');
    }
}
