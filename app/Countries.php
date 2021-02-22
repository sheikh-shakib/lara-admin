<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
   protected $guard=[];
   public function posts()
   {
       return $this->hasManyThrough('App\Post', 'App\User','country_id','user_id','id','id');
   }
}
