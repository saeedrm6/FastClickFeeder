<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryRss;
use App\Post;
use App\Rss;
use App\RssHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Hi';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('isadmin')){
            $all= Category::all();
            return view('category.create',compact('all'));
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('isadmin')){
            if ($request->slug==null){
                $request->slug = str_replace(' ','-',$request->name);
            }
            $cat = Category::create([
                'name'  =>  $request->name,
                'slug'  =>  $request->slug
            ]);
            if ($cat){
                return back()->with('success','The Category has been Add');
            }
            return back()->with('errors','Error on Save');
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $rss = $category->rss;
        $posts = Post::whereIn('rss_id',$rss)->orderBy('created_at','desc')->paginate(30);
        dd($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (Gate::allows('isadmin')){
            $all = Category::all();
            $rsses = $category->rss;
            return view('category.edit',compact('category','all','rsses'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (Gate::allows('isadmin')){
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->save();
            return back()->with('success','The Category has been Update');
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Gate::allows('isadmin')){
            $name = $category->name;
            $cat_id = $category->id;
            $category->delete();
            $acategoriesrss = CategoryRss::where('category_id',$cat_id)->get();
            foreach ($acategoriesrss as $history){
                $history->delete();
            }
            return view('category.create')->with('success','The category has been deleted');
        }else{
            abort(404);
        }
    }

    public function getcontent($url)
    {
        $content = '';
        try{
            $content = file_get_contents($url);
        }catch (Exception $e){
            $content = $e->getMessage();
        }
        return $content;
    }

    public function add_rss(Request $request, Category $category)
    {
        if (Gate::allows('isadmin')){
            $category = Category::find($request->category_id);
            $rss = Rss::create([
               'name'   =>  $request->name,
               'url'   =>  $request->url,
               'homepage'   =>  $request->homepage,
               'logo'   =>  $request->logo,
               'user_id'   =>  Auth::user()->id,
            ]);
            if ($rss){
                $category->rss()->save($rss);
                $history = new RssHistory();
                $history->body=$this->getcontent($rss->url);
                $rss->history()->save($history);
                return back()->with('success','Rss added To Category');
            }
            return back()->with('error','error on save rss');
        }
        abort(404);
    }


}
