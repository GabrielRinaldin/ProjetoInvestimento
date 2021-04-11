<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['uses' => 'App\Http\Controllers\Controller@homepage']);


/**
 * Routes to user auth
 * ==================================
 */    
Route::group(['middleware' => ['auth']], function () {

Route::get('/login', ['uses' => 'App\Http\Controllers\Controller@fazerlogin']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'App\Http\Controllers\DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'App\Http\Controllers\DashboardController@index']);


Route::get('user/moviment', ['as' => 'moviment.index', 'uses' => 'App\Http\Controllers\MovimentsController@index']);

Route::get('getback', ['as' => 'moviment.getback', 'uses' => 'App\Http\Controllers\MovimentsController@getback']);
Route::post('getback', ['as' => 'moviment.getback.store', 'uses' => 'App\Http\Controllers\MovimentsController@storeGetback']);

Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'App\Http\Controllers\MovimentsController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'App\Http\Controllers\MovimentsController@storeApplication']);

Route::get('moviment/all', ['as' => 'moviment.all', 'uses' => 'App\Http\Controllers\MovimentsController@all']);

Route::resource('user', 'App\Http\Controllers\UsersController');
Route::resource('instituition', 'App\Http\Controllers\InstituitionsController');
Route::resource('group', 'App\Http\Controllers\GroupsController');
Route::resource('instituition.product', 'App\Http\Controllers\ProductsController');

Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'App\Http\Controllers\GroupsController@userStore' ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
