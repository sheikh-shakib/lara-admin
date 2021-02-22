<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $users=\App\User::all();
        return view('index', compact('users'));
    }
}
