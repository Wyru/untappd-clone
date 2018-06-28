<?php

namespace App;

use App\HasFriend;

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
