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

    public function checkIns(){
        return $this->hasMany(\App\CheckIn::class);
    }

    public function get_grade(){
        $avg = $this->checkIns()->avg('grade');

        return $avg;
    }

    public function uniqueCheckInsNum(){
        return $this->checkIns()
                        ->select('user_id')
                        ->groupBy('user_id')
                        ->get()
                        ->count();
    }

    public function userCheckIns($user_id){
        return $this->checkIns()
                        ->where('check_ins.user_id', $user_id)
                        ->select('check_ins.*');
    }
}
