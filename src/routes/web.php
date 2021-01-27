<?php

use Illuminate\Support\Facades\Route;

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

/*PageController es el Controller para manejar el front*/
Route::get('/', 'PageController@posts');
Route::get('blog/{post}', 'PageController@post')->name('post');
// Route::get('/categorias', 'PageController@categorias')->name('categorias');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Recursos de backend*/
Route::resource('posts', 'Backend\PostController')
    ->middleware('auth')
    ->except('show');

Route::apiResource('posteos', 'Api\\PostController');

Route::resource('categories', 'Backend\CategoryController')
    ->middleware('auth');

Route::apiResource('categorias', 'Api\\CategoryController');
    