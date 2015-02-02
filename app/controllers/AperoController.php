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

        $this->apero->create($input);

        $rules = [
            'title' => 'required',
            'email'=>'required',
            'date'=>'required',
            'tag'=>'required',
            'description'=>'required',

        ];

        $v = Validator::make($input, $rules);

        if ($v->fails()){
            return Redirect::route('create')->withErrors($v->messages());
        }

        return Redirect::route('create')->withMessage('Your post has been created');

    }

}