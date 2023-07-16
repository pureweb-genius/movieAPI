<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace'=>'App\Http\Controllers'],function (){
   Route::group(['prefix'=>'/genres'],function (){
       Route::get('/','GenreController@index');
       Route::get('/{id}','GenreController@show');
       Route::post('/','GenreController@store');
       Route::put('/{id}','GenreController@update');
       Route::delete('/{id}','GenreController@delete');
       Route::get('/{genre}/movies', 'GenreController@movies');
   }) ;

   Route::group(['prefix'=>'/movies'],function (){
       Route::get('/','MovieController@index');
       Route::get('/{id}','MovieController@show');
       Route::post('/','MovieController@store');
       Route::put('/{id}','MovieController@update');
       Route::delete('/{id}','MovieController@delete');
       Route::put('/{movie}/publish','MovieController@publish');

   }) ;
});
