<?php
class AperoController extends BaseController {

    protected $apero;

    public function __construct(Apero $apero){

        $this->apero = $apero;

    }

    public function index(){

        $tags = Tag::lists('name');

        return View::make('apero.create', compact('tags'));

    }

    public function postCreate(){

        $input = Input::all();

        if (Auth::check()){

            $auth = Auth::id();

        }else{

            throw new Exception('No User found');
        }

        $rules = [
            'title' => 'required',
            'content'=>'required',
        ];

        $v = Validator::make($input, $rules);

        if ($v->fails()){

//            var_dump($v);
//            die();

            return Redirect::to('create')
                ->withInput()
                ->withErrors($v->messages())
                ->withFlashMessage('Please fill out both inputs');

        }else{


            if ($input['tag_id'] == 0){
                $input['tag_id'] = 1;
            }

            $this->apero->create($input);
            return Redirect::route('home');

        }

    }

}