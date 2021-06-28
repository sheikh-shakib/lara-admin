<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\UserProfile;

class User extends Authenticatable
{
    use Notifiable;

    //protected $table='user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $primaryKey = 'email';
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public static function boot(){
    //     parent::boot();
    //     static::addGlobalScope('vfu',function(Builder $builder){
    //         return $builder->where('email_verified_at','<>',null);
    //     });
    // } 

    public function scopefindbyId($query,$id){
        return $query->where('id',$id);
    }
    public function profile(){
        return $this->hasOne(UserProfile::class);
    }
    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id', 'id');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }
}
