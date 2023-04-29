<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post2;

class Post2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post2 = Post2::all();
        return view('post2.index',['post2'=>$post2]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('post2.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post2 = new Post2;
        $post2->title = $request->input('title');
        $post2->body = $request->input('body');
        $post2->save();

        return redirect('post2')->with('message','User Create Sussucfully');
 

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post2 $post2)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post2 = Post2::find($id);
        return view('post2.edit',['post2'=>$post2]);
    }

   
    public function update(Request $request, $id)
    {
       
        $post = Post2::find($id);
        $post->title =$request->input('title');
        $post->body = $request->input('body');

        $post->update();

        return redirect ('post2')->with('message','User Update Sussucfully');
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post2 = Post2::find($id);

       $post2->delete();
       return redirect ('post2')->with('message','User Delete Sussucfully');
    }
}
