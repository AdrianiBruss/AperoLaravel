<?php
class AperoObservers{

    protected function countApero($apero){

        if (!empty($apero->tag)){

            $apero->tag->count_apero = $apero->tag->count_apero++;
            $apero->tag->save();

        }

    }

    public function saved($apero){

        $this->countApero($apero);

    }

}