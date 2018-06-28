<?php

namespace App;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    use UploadTrait;

    protected $table= 'brewery';

    protected $fillable = [
        'name', 'location', 'logo', 'country', 'type'
    ];
}
