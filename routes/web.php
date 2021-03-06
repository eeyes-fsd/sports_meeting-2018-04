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

/** 主页控制路由 */
Route::get('/','StaticPagesController@index')->name('/');
Route::get('/admin','StaticPagesController@admin')->name('admin');

/** 资源控制路由 */
Route::resource('news','NewsController');
Route::resource('games','GamesController');
Route::resource('colleges','CollegesController');
Route::resource('ballot','BallotController',['only'=>['create','store']]);

/** 登陆控制路由 */
Route::get('login','SessionController@login')->name('login');
Route::post('logout','SessionController@logout')->name('logout');
