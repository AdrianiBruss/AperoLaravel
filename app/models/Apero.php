<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 02/02/15
 * Time: 15:51
 */

class Apero extends Eloquent {


    protected $fillable = ['title', 'content', 'user_id', 'tag_id'];

    public function tag(){
        return $this->belongsTo('Tag');
    }

}