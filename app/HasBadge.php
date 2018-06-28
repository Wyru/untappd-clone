<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasBadge extends Model
{
    protected $table = 'has_badge';
    protected $fillable = ['user_id','badge_id', 'check_in_id'];

    public function badge(){
        return $this->belongsTo(\App\Badge::class);
    }
}
