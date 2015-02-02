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

Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);

/**
 * Login
 */
Route::get('login', ['as'=>'login', 'uses'=>'HomeController@login']);
Route::get('disconnect', ['as'=>'disconnect', 'uses'=>'HomeController@disconnect']);
Route::post('register', array('uses'=>'HomeController@checkLogin'));


/**
 * Create Apero
 */

Route::get('create',['before'=>'auth', 'as'=>'create', 'uses'=>'AperoController@index']);
Route::post('postCreate',['before'=>'auth', 'as'=>'create', 'uses'=>'AperoController@postCreate']);