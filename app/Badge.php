<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'id', 'description'
    ];

    public $timestamps = false;

    public function get_image(){
        return asset('/img/badge'.$this->id.'.jpg');
    }
}
