<?php

namespace App;

use App\HasFriend;
use App\CheckIn;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
        
        $query = CheckIn::where('user_id', '=', $this->id)->count();
        return $query;
        
    }
    
    public function count_unique(){
        
        $query = CheckIn::where('user_id', '=', $this->id)
        ->groupBy('beer_id')
        ->count();
        return $query;
        
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

}
