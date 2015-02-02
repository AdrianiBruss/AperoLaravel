<?php
/**
 * Created by PhpStorm.
 * User: adrienbrussolo
 * Date: 02/02/15
 * Time: 15:51
 */

class Apero extends Eloquent {

    public function tag(){
        return $this->belongsTo('Tag');
    }

}