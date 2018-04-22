<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->status == 'publish'){
            $post->setview($post->id);
            return view('posts.layout',compact('post'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function deactive(Request $request)
    {
        $post = Post::find($request->postid);
        $post->status = 'inherit';
        $post->update();
        return back();
    }

    public function republish(Request $request)
    {
        $post = Post::find($request->postid);
        $post->status = 'publish';
        $post->update();
        return back();
    }

    public function showpage($title)
    {
        $post = Post::where('post_type','page')->where('title',str_replace('-',' ',$title))->first();
        if ($post){
            $post->setview($post->id);
            return view('posts.layout',compact('post'));
        }
        abort(404);
    }
}
