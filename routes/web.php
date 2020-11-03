<?php

use Illuminate\Support\Facades\Route;

  
Auth::routes();
Route::get('/', 'App\Http\Controllers\Controller@homepage');
Route::get('cadastro', 'App\Http\Controllers\Controller@cadastrar');

/**
 * Routes to user auth
 * ==========================================
 */

Route::get('login', 'App\Http\Controllers\Controller@fazerlogin');
Route::post('login', ['as' => 'user.login', 'uses' => 'App\Http\Controllers\DashboardController@auth']);
Route::get('dashboard', ['as' => 'user.dashboard', 'uses' => 'App\Http\Controllers\DashboardController@index']);

Route::get('user', ['as' => 'user.index', 'uses' => 'App\Http\Controllers\UsersController@index']);

Route::resource('user', 'App\Http\Controllers\UsersController');
Route::resource('instituition', 'App\Http\Controllers\InstituitionsController');
Route::resource('group', 'App\Http\Controllers\GroupsController');
