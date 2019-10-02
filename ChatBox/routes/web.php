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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/made', function (){
   return view('made');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
###################################################################################################

Route::get('/turn_on_login', 'TurnOnLoginController@index');
Route::resource('chat', 'ChatController');

Route::post('/store', 'HomeController@store');