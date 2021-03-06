<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile ;
use App\Post  ;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username' , 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array --------
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function following (){
        return $this->belongsToMany(Profile::class);
    }


    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at' , 'DESC');
    }

    // public function posts(){
    //     return $this->hasMany(Post::class)->orderBy('created_at' , 'DESC');
    // }
 


    public function profile(  ){
        //one to one relation
        return $this->hasOne(Profile::class);
    }

        protected static function boot(){
            //boot 
            parent::boot();

            static::created(function ($user){
                $user->profile()->create([
                    'title' =>$user->username 
                ]);
            });
        }
}
