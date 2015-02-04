<?php
class AperoController extends BaseController {

    protected $apero;

    public function __construct(Apero $apero){

        $this->apero = $apero;

    }

    /**
     * @return mixed
     * index create apero page
     */
    public function index(){

        $tags = Tag::lists('name');

        return View::make('apero.create', compact('tags'));

    }

    /**
     * @return mixed
     * @throws Exception
     * when posting a new Apero
     */
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

            return Redirect::to('create')
                ->withInput()
                ->withErrors($v->messages())
                ->withFlashMessage('Please fill out both inputs');

        }else{

            if ($input['abstract'] == ''){
                $abstract = str_limit($input['content'], 10);
                $input['abstract'] = $abstract;
            }

            if ($input['tag_id'] == 0){
                $input['tag_id'] = 1;
            }

            $input['url_thumbnail'] = 'img.png';
            $input['status'] = 'open';

//            $this->apero->create($input);

            $apero                  = new Apero;
            $apero->title           = $input['title'];
            $apero->abstract        = $input['abstract'];
            $apero->content         = $input['content'];
            $apero->url_thumbnail   = $input['url_thumbnail'];
            $apero->status          = $input['status'];
            $apero->tag_id          = $input['tag_id'];
            $apero->user_id         = $input['user_id'];
            $apero->date            = new DateTime('now');

            $apero->save();

            return Redirect::route('home');

        }

    }

}