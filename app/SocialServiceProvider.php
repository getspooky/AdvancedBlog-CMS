<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\SocialiteServiceProvider;

class SocialServiceProvider extends Model
{
    //

    public function user(){

        $this->belongsTo(SocialiteServiceProvider::class);

    }

}
