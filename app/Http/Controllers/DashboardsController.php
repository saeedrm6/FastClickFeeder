<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Rss;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

class DashboardsController extends Controller
{
    public function index()
    {

//        $allposts = Cache::get('dashboard-allposts') ? Cache::get('dashboard-allposts') : Cache::put('dashboard-allposts',Post::get()->count(),1);
//        $allrss = Cache::get('dashboard-allrss') ? Cache::get('dashboard-allrss') : Cache::put('dashboard-allrss',Rss::get()->count(),1);
//        $alltags = Cache::get('dashboard-alltags') ? Cache::get('dashboard-alltags') : Cache::put('dashboard-alltags',Tag::get()->count(),1);

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

    public function alltags()
    {
        $alltags = Tag::paginate(20);
        return view('dashboard.alltags',compact('alltags'))->withPatch('adminpanel/tags');
    }

    public function hottags()
    {
        if(!Cache::get('alltags')){
            Cache::put('alltags',Tag::all(),10);
        }
        $alltags = Cache::get('alltags');
        $menu = Menu::where('name','hottags')->count();
        if ($menu == 0){
            $menu = Menu::create([
                'name'   =>  'hottags'
            ]);
        }
        $menu = Menu::where('name','hottags')->first();
        $hottags = $menu->tags;
        return view('dashboard.hottags',compact('alltags','hottags'));
    }

    public function hottagssave(Request $request)
    {
        $menu = Menu::where('name','hottags')->first();
        $menu->tags()->sync($request->input('hottags'));
        return redirect(route('adminpanel.hottags'))->with('success','تگ های داغ بروز شدند');
    }
}
