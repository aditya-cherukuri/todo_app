<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@todo');

Route::get('todo','TasksController@index');

Route::post('todo','TasksController@store');

Route::get('todo/{filter}','TasksController@filter');

Route::get('remove/{name}','TasksController@remove');

Route::get('update/{name}','TasksController@update');


