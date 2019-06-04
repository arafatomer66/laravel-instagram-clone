<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User ;

class Post extends Model
{
    protected $guarded = [] ;
    public function user (){
        return $this->belongsTo(User::class); ; 
    }


    public function profile(){
        return $this->belongsTo(User::classddgg);
    }

    public function hi(){
        return $this->belongsTo(User::classddgg);
    }
}
