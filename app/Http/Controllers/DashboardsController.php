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
        return view('dashboard.dashboard',compact('allposts','allrss','alltags'));
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
