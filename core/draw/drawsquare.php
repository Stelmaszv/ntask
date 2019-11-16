<?php
namespace core\draw;
use core\draw\draw;
class drawsquare extends draw{
    Public function generate(){
        $im=imagecreate($this->data['v1'],$this->data['v1']);
        imagecolorallocate($im,$this->data['color'][0],$this->data['color'][1],$this->data['color'][2]);
        return $this->returnName($im);
    }
}