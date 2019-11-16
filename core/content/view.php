<?php
namespace core\content;
use core\draw\drawimg;
class view{
    public function show(array $items){
        foreach ($items as $key => $value){
            $img=new drawimg($items[$key]);
            $items[$key]['img']=$img->showObjects();
        }
        return $items;
    }
}