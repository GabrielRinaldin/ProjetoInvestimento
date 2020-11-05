<?php

use Illuminate\Support\Facades\Route;

  
Auth::routes();
Route::get('/', 'App\Http\Controllers\Controller@fazerlogin');
Route::get('cadastro', 'App\Http\Controllers\Controller@cadastrar');
Route::get('dashboard', 'App\Http\Controllers\Controller@index');

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
Route::resource('instituition.product', 'App\Http\Controllers\ProductsController');


/***
 * ======================================================
resource simplifica todos os metodos de rotas para a controller
get para ir a index, post (store) para salvar dados, get({id}) para mostrar 
update ({id}) para atualizar e delete para deletar
todos dentro de uma mesma rota.
Sendo eles

Route::('group', 'GroupsController@index) ir a pagina inicial 
Route::post('group', 'GroupsController@store) inserir dados
Route::get('group/{id}', 'GroupsController@show) mostrar dados
Route::update('group/{id}', 'GroupsController@update) atualizar dados
Route::delete('group/{id}', 'GroupsController@delete) deletar dados
=========================================================
*/

Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'App\Http\Controllers\GroupsController@userStore' ]);
