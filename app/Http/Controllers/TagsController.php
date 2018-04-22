<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
class TagsController extends Controller
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
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($tagname)
    {
        $key = str_replace('-',' ',$tagname);
        $hottags = Menu::where('name','hottags')->first()->tags;
        $tag = Tag::where('name',$key)->first();

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts = Cache::remember('postoftag-'.$tagname.'-'.$currentPage,1,function () use($tagname,$key,$hottags,$tag){
            return $tag->posts()->orderBy('created_at','desc')->paginate(30);
        });


        return view('website.showtag',compact('hottags','posts','tagname'))->withPatch('tags/'.str_replace(' ','-',$key));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
