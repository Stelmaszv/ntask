<?php
namespace core\draw;
use core\draw\draw;
class drawrectangle extends draw{
    public function generate(){
        if($this->data['v2']!==0){
            $im=imagecreate($this->data['v1'],$this->data['v2']);
            imagecolorallocate($im,$this->data['color'][0],$this->data['color'][1],$this->data['color'][2]);
            return $this->returnName($im);
        }else{
            die('v2 is undefined for rectangle with id '.$this->data['id']);
        }
    }
}