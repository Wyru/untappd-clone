<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{

    protected $fillable = [
        'user_id', 'check_in_id', 'description'
    ];

    public function getUser(){
        return User::find($this->user_id);
    }

}
