<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//protected $table='post';
    protected $guard = [];
    protected $fillable=['title'];
	// public function user()
    // {
    //     return $this->belongsTo('App\UserProfile', 'user_id', 'id');
    // }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // public static function boot(){
    //     parent::boot();
    //     static::addGlobalScope('vfu',function(Builder $builder){
    //         return $builder->where('thumbnail','=',null);
    //     });
    // } 

}
