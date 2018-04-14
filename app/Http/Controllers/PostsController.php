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
        #get view count
        #return $post->getview->meta_value;


        #Get most view posts with date and time parameter
//            return \DB::table('posts')
//                ->join('postmeta', 'posts.id', '=', 'postmeta.post_id')
//                ->whereDate('created_at','2018-04-13')
//                ->whereTime('created_at', '<', '15:33')
//                ->orderBy(\DB::raw('ABS(postmeta.meta_value)'), 'DESC')
//                ->paginate(15);

        #Get tags that have more posts
//        return Tag::withCount('posts')->orderBy('posts_count', 'desc')->paginate(10);



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
}
