<?php

namespace App;

use App\HasFriend;
use App\CheckIn;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\UploadTrait;

class User extends Authenticatable
{
    use Notifiable;
    use UploadTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','first_name', 'last_name', 'location', 'birthday','gender', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function count_friends(){
        $query = HasFriend::where(function($queryy){
            $queryy->where('user_sender',$this->id)->orWhere(
                'user_receiver',$this->id
            );
        })->where('status', '=', true)
        ->count();
        
        return $query;
        
    }
    
    public function count_total(){
        
        return CheckIn::where('user_id', '=', $this->id)->get()->count();
        
    }
    
    public function count_unique(){
        
        return CheckIn::where('user_id', '=', $this->id)
                        ->selectRaw('DISTINCT beer_id')
                        ->get()
                        ->count();

        
    }
    
    public function is_friend($id){

        $query = HasFriend::where([
            ['user_sender',$this->id],
            ['user_receiver',$id]
        ])->orWhere([
            ['user_sender',$id],
            ['user_receiver',$this->id]
        ])
        ->first();

        // dd($query);

        if(isset($query)){
            if($query->status == true){
                return 1;
            }
            else{
                return 0; //Solicitação enviada
            }
        }
        else{
            return -1; //Não é amigo
        }

    }

    public function get_photo(){
        return isset($this->photo)? route('file',$this->photo):asset('/img/default_avatar.jpg');
    }

    public function checkIns(){
        return $this->hasMany(\App\CheckIn::class);
    }

    public function friends(){
        $friends = HasFriend::where('user_sender', '=', $this->id)
            ->orWhere('user_receiver', '=', $this->id)
            ->get();

        $user_ids = array();

        foreach ($friends as $friend) {
            if($friend->status){
                if($friend->user_sender == $this->id){
                    array_push($user_ids, $friend->user_receiver);
                }
                else{
                    array_push($user_ids, $friend->user_sender);
                }
            }
        }
        
        return User::whereIn('id', $user_ids)->get();
    }


    public function badges(){
        return $this->hasMany(\App\HasBadge::class);
    }

    public function beers(){
        $beer_ids = $this->checkIns()->select('beer_id')->groupBy('beer_id')->get()->pluck('beer_id');
        return Beer::whereIn('id', $beer_ids)->get();
        
    }
}
