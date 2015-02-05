<?php
class AperoObservers{

    protected function countApero($apero){

        $apero->tag->count_apero = $apero->tag->count_apero+1;
        $apero->tag->save();


    }

    public function saved($apero){

        $this->countApero($apero);

    }

}