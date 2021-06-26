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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','SiteController@index')->name('home');
Route::get('/about','SiteController@about')->name('about_us');
Route::get('/contact','SiteController@contact')->name('contact_us');
Route::get('/blog','SiteController@blog')->name('news');

Route::namespace('Admin')->name('admin.')->prefix('/c-admin')->group(function(){

Route::get('/', function(){
    return view('admin.dashboard');
});

Route::resource('/posts','PostController');

});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
