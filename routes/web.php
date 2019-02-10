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

Route::get('/', 'AlbumsController@index');

Route::get('/albums', ['uses'=>'AlbumsController@index', 'as'=>'albums']);

Route::get('/albums/create', ['uses'=>'AlbumsController@create', 'as'=>'albums.create']);

Route::post('/albums/store', ['uses'=>'AlbumsController@store', 'as'=>'albums.store']);

Route::get('/albums/{id}', ['uses'=>'AlbumsController@show', 'as'=>'albums.show']);
//------------------------------------------------------------------------------------

Route::get('/photos/create/{id}', ['uses'=>'PhotosController@create', 'as'=>'photos.create']);

Route::post('/photos/store', ['uses'=>'PhotosController@store', 'as'=>'photos.store']);

Route::get('/photos/{id}', ['uses'=>'PhotosController@show', 'as'=>'photos.show']);

Route::delete('/photos/{id}', ['uses'=>'PhotosController@destroy', 'as'=>'photos.destroy']);

