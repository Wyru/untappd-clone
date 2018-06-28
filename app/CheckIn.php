<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadTrait;
use App\Comment;

class CheckIn extends Model
    {
        use UploadTrait;

    protected $table = 'check_ins';
    protected $fillable = ['user_id', 'beer_id', 'grade'];


    public function comments(){
        return $this->hasMany(\App\Comment::class, 'check_in_id', 'id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function beer(){
        return $this->belongsTo(\App\Beer::class);
    }

    public function brewery(){
        return $this->beer->brewery();
    }
}
