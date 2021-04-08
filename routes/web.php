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
    return view('child.auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'parent', 'middleware' => 'auth:parent'], function(){
  Route::get('home', 'Admin\ParentController@index'); 
  Route::post('logout', 'Admin\Auth\LoginController@logout')->name('parent.logout');

});
Route::group(['prefix' => 'parent'], function(){
  Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('parent.login');
  Route::post('login', 'Admin\Auth\LoginController@login');
  
});

// Child Route

Route::get('home', 'Child\ChildController@index')->middleware('auth:child'); 
Route::post('logout', 'Child\Auth\LoginController@logout')->middleware('auth:child')->name('logout');
Route::get('login', 'Child\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Child\Auth\LoginController@login');
  
  
  