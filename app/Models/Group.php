<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['year','finished_time','name','is_deleted'];
    protected $primaryKey = 'year';
    protected $keyType = 'year';
    public $incrementing = false;
    use HasFactory;

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
