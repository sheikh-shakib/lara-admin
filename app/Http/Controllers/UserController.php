<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=\App\User::with(['roles','profile'])->get();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=\App\Role::all();
        $countries=\App\Countries::all();
        return view('dashboard.users.create', compact('roles','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=[
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
        ];
        $user=\App\User::create($user);
        $filename=sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if ($request->hasFile('photo')) {
            $folder=$request->file('photo')->storeAs('images',$filename,'public');
        }else {
            $folder='images/dummy.jpg';
        };
        if ($user) {
            $profile=new \App\UserProfile([
                'city'=>$request->city, 
                'user_id'=>$user->id,
                'country_id'=>$request->country,
                'photo'=>$folder,
                'phone'=>$request->phone
            ]);
        };
        $user->profile()->save($profile);
        $user->roles()->attach($request->roles);
        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::with(['roles','profile'])->first();
        return view('dashboard.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=\App\User::with(['profile'])->where('id',$id)->first();
        $countries=\App\Countries::all();
        $roles=\App\Role::all();
        return view('dashboard.users.edit', compact('user','countries','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=\App\User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
        $filename=sprintf('thumbnail_%s.jpg',random_int(1,1000));
        if ($request->hasFile('photo')) {
            $folder=$request->file('photo')->storeAs('images',$filename,'public');
        }else {
            $folder=$user->profile->photo;
        };
        if ($user->save()) {
            $profile=[
                'city'=>$request->city, 
                'user_id'=>$user->id,
                'country_id'=>$request->country,
                'photo'=>$folder,
                'phone'=>$request->phone
            ];
        };
        $user->profile()->update($profile);
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=\App\User::find($id);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
