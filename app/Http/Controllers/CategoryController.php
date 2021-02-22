<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('children')->get();
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::with('children')->get();
        return view('dashboard.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $category = new Category;
        $category->title = $request->title;
        $category->content = $request->content;
        if ($request->hasFile('thumbnail')) {
            $folder=sprintf('thumbnail_%s.jpg',random_int(1,1000));
            $filename = $request->file('thumbnail')->storeAs('images',$folder);
            $category->thumbnail = $filename;
        }else{
           $filename=null;
        }
        $category->parent_id = $request->parent_id;
        $save = $category->save();
        if ($save) { 
             return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::with('children')->first();
        return view('dashboard.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::where('id','<>',$category->id)->get();
        return view('dashboard.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->content = $request->content;
        if ($request->hasFile('thumbnail')) {
            $folder=sprintf('thumbnail_%s.jpg',random_int(1,1000));
            $filename = $request->file('thumbnail')->storeAs('images',$folder);
            $category->thumbnail = $filename;
        }else{
           $filename=$category->thumbnail;
           $category->thumbnail=$filename;
        }
        $category->parent_id = $request->parent_id;
        $save = $category->save();
        if ($save) { 
             return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
