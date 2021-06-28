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
Route::view('', 'welcome', ['name' => 'Sheikh Shakib']);

//Resource Controller For CMS
Route::group(['prefix' => '/admin','middleware'=>['auth']], function () {
    Route::view('', 'dashboard/admin');
    Route::resource('posts','PostController');
    Route::resource('pages', 'PageController');
    Route::resource('users', 'UserController',['middleware'=>'password.confirm']);
    Route::resource('profiles', 'UserProfileController');
    Route::resource('categories', 'CategoryController');
    Route::resource('roles', 'RoleController'); 
    Route::resource('dashboards', 'DashboardController'); 
});

Auth::routes(); 
Route::match(['get', 'post'], '/home', 'HomeController@index')->name('home');
