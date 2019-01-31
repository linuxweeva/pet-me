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

Route::get('/', function () {
	return redirect() -> route( 'home' );
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/category/{id}', 'PetController@getCategory');
Route::get( '/pet/{id}' , 'HomeController@showPet' )->name( 'pet' );

// OAuth Routes
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['middleware' => ['admin']], function () {
	Route::get('/admin', 'AdminController@categories');
	Route::post('admin/category/add', 'CategoryController@store');
	Route::get('/admin/pets', 'AdminController@pets');
	Route::post('/admin/pet/add', 'PetController@store');

});
