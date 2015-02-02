<?php


class Tag extends Eloquent {

    public function aperos(){
        return $this->hasMany('Apero');
    }

}
