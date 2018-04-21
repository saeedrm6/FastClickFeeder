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
    $mostviews = \DB::table('posts')
        ->join('postmeta', 'posts.id', '=', 'postmeta.post_id')
        ->whereDate('created_at',$today)
        ->whereTime('created_at', '>', '00:00')
        ->orderBy(\DB::raw('ABS(postmeta.meta_value)'), 'DESC')
        ->take(4)->get();
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
    Route::post('posts/deactive','PostsController@deactive')->name('posts.deactive');
    Route::post('posts/republish','PostsController@republish')->name('posts.republish');
});
Route::resource('category','CategoriesController');
Route::resource('rss','RssController');
Route::resource('tags','TagsController');
Route::resource('posts','PostsController');
Route::get('tags/{tagname}','TagsController@show');




