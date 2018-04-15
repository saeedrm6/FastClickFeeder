<?php

namespace App\Http\Controllers;

use App\Category;
use App\Rss;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;

class DashboardsController extends Controller
{
    public function index()
    {

        $allposts=Post::get()->count();
        $allrss=Rss::get()->count();
        $alltags=Tag::get()->count();


        #Get most view latest 24 Hour ago
        $today = date('Y-m-d');
        $lastday = date("Y-m-d", strtotime("-1 day") );
        $mostview = \DB::table('posts')
            ->join('postmeta', 'posts.id', '=', 'postmeta.post_id')
            ->whereDate('created_at',$today)
            ->whereTime('created_at', '>', '00:00')
            ->orderBy(\DB::raw('ABS(postmeta.meta_value)'), 'DESC')
            ->take(8)->get();
        return view('dashboard.dashboard',compact('allposts','allrss','alltags','mostview'));
    }

    public function allposts()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.posts',compact('posts'))->withPath('adminpanel/posts');
    }

    public function allcategories()
    {
        $categories = Category::paginate(20);
        return view('dashboard.allcategories',compact('categories'))->withPatch('adminpanel/category');
    }

    public function allrss()
    {
        $allrss = Rss::paginate(20);
        return view('dashboard.allrss',compact('allrss'))->withPatch('adminpanel/rss');
    }
}
