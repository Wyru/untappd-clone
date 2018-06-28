<?php

namespace App;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use UploadTrait;

    protected $fillable = [
        'name', 'type', 'photo', 'alcoholic_content', 'brewery_id'
    ];

    public function brewery(){
        return $this->belongsTo(\App\Brewery::class);
    }
}
