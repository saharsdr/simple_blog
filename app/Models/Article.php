<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'title', 'post_id'];
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }

    public function methaarticles(){
        return $this->hasMany('App\Models\MethaArticle');
    }
}
