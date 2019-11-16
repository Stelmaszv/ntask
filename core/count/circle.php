<?php
namespace core\count;
use core\count\square;
class circle extends square{
    const PI=3.1415;
    public function set(){
        $this->data['volume']=$this->data['var1']*$this->data['var1'];
        $this->data['volume']=self::PI*$this->data['volume'];
    }
}