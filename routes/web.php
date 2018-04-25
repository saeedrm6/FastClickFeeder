<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//require_once "../app/myfunctions/global.php";

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    $today = date('Y-m-d');
//    $mostviews = \DB::table('posts')
//        ->join('postmeta', 'posts.id', '=', 'postmeta.post_id')
//        ->whereDate('created_at',$today)
//        ->whereTime('created_at', '>', '00:00')
//        ->where('post_type','!=','page')
//        ->orderBy(\DB::raw('ABS(postmeta.meta_value)'), 'DESC')
//        ->orderBy('created_at','DESC')
//        ->take(4)->get();

    $mostviews = Cache::remember('mostviewofhomepage',1,function () use($today){
        return \DB::table('posts')
            ->join('postmeta', 'posts.id', '=', 'postmeta.post_id')
            ->whereDate('created_at',$today)
            ->whereTime('created_at', '>', '00:00')
            ->where('post_type','!=','page')
            ->orderBy(\DB::raw('ABS(postmeta.meta_value)'), 'DESC')
            ->orderBy('created_at','DESC')
            ->take(4)->get();
    });

    $hottags = \App\Menu::where('name','hottags')->first()->tags;
    $homeboxes = \App\HomeBox::orderBy('periorty','asc')->with('category')->get();
    return view('website.homepage',compact('mostviews','hottags','homeboxes'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    /*  Custom URLS  */
    Route::post('category/add_rss/{category_id}','CategoriesController@add_rss')->name('category.add_rss');
    Route::get('adminpanel','DashboardsController@index')->name('adminpanel.index');
    Route::get('adminpanel/posts','DashboardsController@allposts')->name('adminpanel.posts');
    Route::get('adminpanel/category','DashboardsController@allcategories')->name('adminpanel.categories');
    Route::get('adminpanel/rss','DashboardsController@allrss')->name('adminpanel.rss');
    Route::get('adminpanel/tags','DashboardsController@alltags')->name('adminpanel.tags');
    Route::get('adminpanel/tags/hottags','DashboardsController@hottags')->name('adminpanel.hottags');
    Route::post('adminpanel/tags/hottags','DashboardsController@hottagssave')->name('adminpanel.savehottags');
    Route::get('adminpanel/homepage/homebox','DashboardsController@managehomebox')->name('adminpanel.managehomebox');
    Route::post('adminpanel/homepage/homebox','DashboardsController@edithomebox')->name('adminpanel.managehomebox');
    Route::get('adminpanel/pages/allpages','DashboardsController@allpages')->name('adminpanel.allpages');
    Route::get('adminpanel/pages/newpage','DashboardsController@createpage')->name('adminpanel.newpage');
    Route::get('adminpanel/pages/editpage/{id}','DashboardsController@editpage')->name('adminpanel.editpage');
    Route::post('adminpanel/pages/editpage/{id}','DashboardsController@updatepage')->name('adminpanel.updatepage');
    Route::post('adminpanel/pages/newpage','DashboardsController@savepage')->name('adminpanel.savepage');
    Route::post('posts/deactive','PostsController@deactive')->name('posts.deactive');
    Route::post('posts/republish','PostsController@republish')->name('posts.republish');
});
Route::resource('category','CategoriesController');
Route::resource('rss','RssController');
Route::resource('tags','TagsController');
Route::resource('posts','PostsController');
Route::get('tags/{tagname}','TagsController@show');
Route::get('pages/{title}','PostsController@showpage');



