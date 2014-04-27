<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'CharacterController@index'));
Route::get('/character/show/{id}', array('as' => 'character.show', 'uses' => 'CharacterController@show'));
Route::get('/character/edit/{id}', array('as' => 'character.edit', 'uses' => 'CharacterController@edit'));
Route::post('/character/edit/{id}', array('as' => 'character.update', 'uses' => 'CharacterController@update'));
Route::get('/character/create', array('as' => 'character.create', 'uses' => 'CharacterController@create'));
Route::get('/character/delete/{id}', array('as' => 'character.destroy', 'uses' => 'CharacterController@destroy'));
Route::post('/character/create', array('as' => 'character.store', 'uses' => 'CharacterController@store'));
Route::get('/quest/show/{id}', array('as' => 'quest.show', 'uses' => 'QuestController@show'));
Route::get('/quest/create/', array('as' => 'quest.create', 'uses' => 'QuestController@create'));
Route::get('/quest/edit/{id}', array('as' => 'quest.edit', 'uses' => 'QuestController@edit'));