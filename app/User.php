<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function userRole(){
        return $this->hasOne('App\UserRole', "userId");
    }
}
