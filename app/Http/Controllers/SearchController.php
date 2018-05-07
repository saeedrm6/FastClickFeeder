<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Post;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = $request->q;
        #Note:
        #agar az Model bekhaei 2ta where begiri dar vaghe oon AND where hastesh na OR where
        #pas majbori az table estefade koni :|
        $hottags = Menu::where('name','hottags')->first()->tags;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts = Cache::remember('postofsearch-'.$key.'-'.$currentPage,3,function () use($key){
            return DB::table('posts')
                ->where('title','like','%'.$key.'%')
                ->orWhere('excerpt','like','%'.$key.'%')
                ->orWhere('content','like','%'.$key.'%')
                ->orderBy('created_at','DESC')
                ->paginate(30);
        });
        return view('website.showsearchresults',compact('posts','hottags','key'));
    }
}
