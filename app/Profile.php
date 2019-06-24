<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Profile extends Model
{

    protected $guarded = [] ;

    public function user (){
        return $this->belongsTo(User::class);
    }


    public function profileImage(){
        $imagePath = ($this->image)? $this->image :'profile/swOjrp2d5EVRnZWviK0tw5vXkrHUgRPnTjCpqdfA.png';
        return '/storage/' . $imagePath ;
    }
    public function follower (){
        return $this->belongsToMany(User::class);
    }
    
}
