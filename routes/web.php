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

Route::get('/', function () {
    return view('welcome');
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
});
Route::resource('category','CategoriesController');
Route::resource('rss','RssController');
Route::resource('tags','TagsController');
Route::get('tags/{tagname}','TagsController@show');


//class exclusive_functions{
//
//    public function select($query)
//    {
//        return DB::select($query);
//    }
//
//    public function delete($table,$coloumn,$if,$value)
//    {
//        return DB::table($table)->where($coloumn, $if, $value)->delete();
//    }
//
//}
//$myexclusive = new exclusive_functions();




