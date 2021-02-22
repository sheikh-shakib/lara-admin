<?php

namespace App;
use app\user;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable=['user_id','photo','phone','city'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function user()
    // {
    //     return $this->hasMany('App\Post', 'user_id', 'id');
    // }
    public function post()
    {
        return $this->hasOneThrough('App\Post', 'App\User', 'id','user_id','id','id');
    }
}
