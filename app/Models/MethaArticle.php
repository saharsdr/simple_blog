<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethaArticle extends Model
{
    protected $table = 'metha_articles';
    use HasFactory;

    public function article(){
        return $this->belongsTo('App\Models\Article');
    }
}
