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

	protected $apero;

	public function __construct(Apero $apero){

		$this->apero = $apero;

	}

	public function index(){

		$aperos = $this->apero->all();

//		$aperos = $this->apero->take(3)->get();

		return View::make('index', compact('aperos'));

	}

	public function showSingle($id){

		$apero = $this->apero->find($id);

		return View::make('apero.single', compact('apero'));

	}


	public function login(){

		return View::make('login.login');

	}

	public function disconnect(){
		Auth::logout();
		$aperos = $this->apero->all();
		return View::make('index', compact('aperos'));
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
