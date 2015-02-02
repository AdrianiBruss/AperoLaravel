<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/



	public function index(){

		$aperos = Apero::all();

		return View::make('home', compact('aperos'));

	}
	public function login(){

		return View::make('login');

	}

	public function disconnect(){
		Auth::logout();
		return View::make('home');
	}

	public function checkLogin(){

		$rules = array(
			'username'=>'required',
			'password'=>'required',
		);


		$validator = Validator::make(Input::all(), $rules);


		if($validator->fails()){

			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));


		}else{

			$user_data = array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
			);

			if(Auth::attempt($user_data)){

				return Redirect::to('/');

			}else{

				return Redirect::to('login');

			}

		}

	}

}
