<?php

namespace App\Http\Controllers;

use App\Category;
use App\Rss;
use foo\bar;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \SimpleXMLElement;
use App\RssHistory;
use App\myfunctions\GetAllmeta;
class RssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('isadmin')){
            $all = Category::all();
            return view('rss.create',compact('all'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

    public function store(Request $request)
    {
        if (Gate::allows('isadmin')){
            $rss = Rss::create([
               'name'   =>  $request->name,
               'url'   =>  $request->url,
               'homepage'   =>  $request->homepage,
               'logo'   =>  $request->logo,
               'user_id'   =>  Auth::user()->id,
            ]);
            if ($rss){
                $rss->categories()->sync($request->input('categories'));
                $history = new RssHistory();
                $history->body=$this->getcontent($rss->url);
                $rss->history()->save($history);
                return back()->with('success','The Rss has been Add');
            }else{
                return back()->with('errors','Error on save!');
            }
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RSS  $rSS
     * @return \Illuminate\Http\Response
     */
    public function show(Rss $rss)
    {
//        return RenderRss($rss->url);
        return file_get_contents($rss->url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RSS  $rSS
     * @return \Illuminate\Http\Response
     */
    public function edit(Rss $rss)
    {
        if (Gate::allows('isadmin')){
            $all = Category::all();
            $hercat = $rss->categories;
            return view('rss.edit',compact(['rss','all','hercat']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RSS  $rSS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rss $rss)
    {
        $rss->name=$request->name;
        $rss->url=$request->url;
        $rss->homepage=$request->homepage;
        $rss->logo=$request->logo;
        $rss->categories()->sync($request->input('categories'));
        $rss->save();
        return back()->with('success','The Rss Edited successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RSS  $rSS
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rss $rss)
    {
        if (Gate::allows('isadmin')){
            $name = $rss->name;
            $rss->delete();
            $all = Category::all();
            return view('category.create',compact('all'))->with('success','The category has been deleted');
        }
        abort(404);
    }
}
