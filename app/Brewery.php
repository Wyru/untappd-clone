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


    public function beers(){
        return $this->hasMany(\App\ Beer::class, 'brewery_id', 'id');
    }


    public function checkIns(){
        return CheckIn::join('beers','beers.id','=', 'check_ins.beer_id')
                            ->join('brewery','beers.brewery_id','=','brewery.id')
                            ->where('brewery.id', $this->id)
                            ->select('check_ins.*');
    }

    public function userCheckIns($user_id){
        return CheckIn::join('beers','beers.id','=', 'check_ins.beer_id')
                            ->join('brewery','beers.brewery_id','=','brewery.id')
                            ->where('brewery.id', $this->id)
                            ->where('check_ins.user_id', $user_id)
                            ->select('check_ins.*');
    }

    public function UniqueCheckInsNum(){
        return CheckIn::join('beers','beers.id','=', 'check_ins.beer_id')
                            ->join('brewery','beers.brewery_id','=','brewery.id')
                            ->where('brewery.id', $this->id)
                            ->select('check_ins.beer_id','check_ins.user_id')
                            ->groupBy('check_ins.beer_id','check_ins.user_id')

                            ->get()
                            ->count();
                            
    }

    public function get_grade(){
        $avg = CheckIn::join('beers','beers.id','=', 'check_ins.beer_id')
                ->join('brewery','beers.brewery_id','=','brewery.id')
                ->where('brewery.id', $this->id)
                ->avg('check_ins.grade');

        return $avg;
    }
}
