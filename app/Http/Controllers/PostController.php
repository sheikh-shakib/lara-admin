<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use App\Http\Requests\sakib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Auth\Events\Validated;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $data = DB::select('select * from profile');
    //    dd($data);
        // $data= DB::insert('insert into profile (name, phone, country, city) values (?, ?, ?, ?)', ['Mohit', '0174566688' , 'BD', 'Rangpur']);
        // DB::table('profile')
        // ->where('id', 1)
        // ->update(['name' => 'MMMM']);
        //DB::table('profile')->where('id', 1)->delete();
        // DB::table('profile')->insert([
        //     ['name' => 'taylor', 'phone' => 12555488,'country'=>'BD','city'=>'Raaa'],     
        //      ['name' => 'ddd', 'phone' => 1442555488,'country'=>'lD','city'=>'Raaa'],
        // ]);
    //     $orders = DB::table('orders')
    //     ->whereRaw('price > IF(state = "TX", ?, 100)', [200])
    //     ->get();
    //    dd($orders);
    // $users = DB::table('profile')
    // ->groupBy('name')->select('name')
    // ->get();
    // dd($users);
    // DB::table('profile')
    // ->updateOrInsert(
    //     ['city' => 'jamalpur'],
    //     ['id' => '5']
    // );
        $posts=Post::with(['user','category'])->get();
        return view('dashboard.posts.index', compact('posts'));
    
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

       return view('dashboard.posts.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        $post=new Post;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=Auth::user()->id;
        $post->category_id=$request->category_id;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post=Post::find($id);
    //    Gate::authorize('allow-edit',$post->user->id);
        // if ($response->denied()) {
        //     return redirect()->back()->with('msg',$response->message());
        // }
         $categories=Category::all();
       return view('dashboard.posts.edit', compact('post','categories'));
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
        $validateData=$request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        $post=Post::find($id);
        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->user_id=Auth::user()->id;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $post=Post::find($id);
        // Gate::authorize('allow-edit',$post->user->id);
        // $response=Gate::inspect('delete',$post);
        // if ($response->denied()) {
        //     return redirect()->back()->with('msg',$response->message());
        // }
        $deleted=$post->delete();
        if ($deleted) {
            return redirect()->route('posts.index');
        }
    }
 
    
    
}
