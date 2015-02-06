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

/**
 * Home Page
 */
Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);

/**
 * Login
 */
Route::get('login', ['as'=>'login', 'uses'=>'HomeController@login']);
Route::get('logout', ['as'=>'disconnect', 'uses'=>'HomeController@logout']);
Route::post('register', array('uses'=>'HomeController@checkLogin'));




/**
 * Page single apero
 */
Route::get('single/{id}', array('uses' => 'AperoController@showSingle'));

/**
 * Create Apero
 */

Route::get('create',['before'=>'auth', 'as'=>'create', 'uses'=>'AperoController@index']);
Route::post('postCreate',['before'=>'auth', 'as'=>'postCreate', 'uses'=>'AperoController@postCreate']);


/**
 * Search Apero
 */
Route::get('search', ['as'=>'search', 'uses'=>'AperoController@search']);