<?php
namespace core\draw;
use core\draw\draw;
class drawcircle extends draw{
    public function generate(){
        $image = ImageCreate($this->data['v1'],$this->data['v1']); 
        $bg = ImageColorAllocate($image, 255, 255, 255);
        $black = ImageColorAllocate($image, $this->data['color'][0], $this->data['color'][1],$this->data['color'][2]); 
        ImageArc($image, $this->data['v1']/2, $this->data['v1']/2, $this->data['v1'], $this->data['v1'], 0, 360, $black); 
        ImageFillToBorder($image, $this->data['v1']/2, $this->data['v1']/2, $black, $black);
        return $this->returnName($image);
    }
}