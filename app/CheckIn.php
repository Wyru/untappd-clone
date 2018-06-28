<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $table = 'check_ins';
    protected $fillable = ['user_id', 'beer_id', 'grade'];
}
