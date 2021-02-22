<?php

namespace App\Gates;

use Illuminate\Auth\Access\Response;

class PostGate{
    public function allowed($user,$post){
        return $user->id===$post;
    }

    public function allowedAction($user,$post){
        $roles=$user->roles->pluck('name')->toArray();
        return $user->id===$post || in_array('admin',$roles) ? Response::allow() : Response::deny('You are not authorized') ;
    }
}