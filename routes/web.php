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

Route::group(['prefix' => 'parent'], function(){
  Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('parent.login');
  Route::post('login', 'Admin\Auth\LoginController@login');
});

Route::group(['prefix' => 'parent', 'middleware' => 'auth:parent'], function(){
  Route::get('home', 'Admin\ParentController@index'); 
  Route::post('logout', 'Admin\Auth\LoginController@logout')->name('parent.logout');
  Route::get('children', 'Admin\ParentController@children');
  Route::get('children/add', 'Admin\ParentController@add');
  Route::post('children/add', 'Admin\ParentController@childrenAdd');
  Route::get('member/edit','Admin\ParentController@showMemberEdit');
  Route::post('member/edit','Admin\ParentController@memberEdit');
  Route::get('member/delete', 'Admin\ParentController@memberDelete');
  Route::get('help/create', 'Admin\ParentController@showHelpCreate');
  Route::post('help/create', 'Admin\ParentController@helpCreate');
  Route::get('help/delete', 'Admin\ParentController@showHelpDelete');
  Route::get('delete', 'Admin\ParentController@helpDelete');
  Route::get('approval', 'Admin\ParentController@showApproval');
  Route::get('helpApproval', 'Admin\ParentController@approval');
  Route::get('helpRejected', 'Admin\ParentController@rejected');
  Route::get('set', 'Admin\ParentController@showSet');
  Route::post('set', 'Admin\ParentController@set');
});



// Child Route
Route::get('login', 'Child\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Child\Auth\LoginController@login');

Route::group(['middleware' => 'auth:child'], function(){
  Route::get('home', 'Child\ChildController@index'); 
  Route::post('logout', 'Child\Auth\LoginController@logout')->name('logout');
  Route::get('help', 'Child\ChildController@showHelp');
  Route::get('request', 'Child\ChildController@help');
  Route::get('help/cancel', 'Child\ChildController@showCancel');
  Route::get('cancel', 'Child\ChildController@cancel');
});
  
  