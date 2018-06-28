<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasFriend extends Model
{
    protected $table = 'has_friend';
    protected $fillable = ['user_sender', 'user_receiver'];

}
