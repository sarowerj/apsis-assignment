<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.basic')->post('task', 'TaskController@index');
// get specific task
Route::middleware('auth.basic')->get('task/{id}', 'TaskController@show');
Route::middleware('auth.basic')->post('task/create', 'TaskController@create');
Route::middleware('auth.basic')->post('category', 'CategoryController@index');
