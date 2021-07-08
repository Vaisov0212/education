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
Route::post('/','SiteController@appStore')->name('message');
Route::get('/about-us','SiteController@about')->name('about_us');
Route::get('/contact-us','SiteController@contact_us')->name('contact_us');
Route::get('/blog','SiteController@blog')->name('news');
Route::get('/blog/{id}','SiteController@show')->name('show_blog');
Route::post('/contact','SiteController@contact')->name('contact');

Route::namespace('Admin')->name('admin.')->middleware('auth')->prefix('/c-admin')->group(function(){

Route::get('/', 'Admincontroller@index')->name('dashboard');
Route::resource('/feedback', 'FeedbackController');

Route::resource('/posts','PostController');

Route::resource('/message','MessageController');

});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
