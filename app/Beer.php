<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = [
        'name', 'type', 'photo', 'alcoholic_content', 'brewery_id'
    ];
}
