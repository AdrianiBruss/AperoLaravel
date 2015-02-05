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

    public function search(){

        $aperos = $this->apero->all();
        $tags = Tag::lists('name');
        return View::make('apero.search', compact('aperos', 'tags'));

    }

    /**
     * @return mixed
     * @throws Exception
     * when posting a new Apero
     */
    public function postCreate(){

        $input = Input::all();

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
        }

        $apero                  = new Apero;
        $apero->title           = $input['title'];
        $apero->abstract        = str_limit($input['content'], 10);
        $apero->content         = $input['content'];
        if(Input::hasfile('url_thumbnail')){
            $apero->url_thumbnail=$this->uploadImage();
        }
        $apero->status          = 'published';
        if ($input['tag_id'] == 0){
            $input['tag_id'] = 1;
        }
        $apero->tag_id          = intval($input['tag_id']);

        if (Auth::check()){
            $auth = Auth::id();
        }else{
            throw new \RuntimeException('No User found');
        }

        $apero->user_id         = $auth;
        $apero->date            = $input['date'];

        $apero->save();

//        var_dump($input);
        return Redirect::route('home')
            ->withMessage('success');



    }

    public function uploadImage(){

        $file = Input::file('url_thumbnail');
        $files = [$file];
        $rules = ['image' => 'image|mime:jpg,png,gif, jpeg|max:3000'];
        $validator = Validator::make($files, $rules);
        $fileExtension = $file->getClientOriginalExtension();
        $destinationPath = 'uploads/';
        $filename = str_random(15) . '.' . $fileExtension;
        $upload_success = $file->move($destinationPath, $filename);
        if ($upload_success) {
            return $filename;
        }else{
            Session::flash('messageAperoCreate', "<p class='error bg-danger'><span class='glyphicon glyphicon-remove' style='color:red;'></span>Problème d'upload.</p>");
            return Redirect::back();
        }

    }

}