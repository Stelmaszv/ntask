<?php
namespace core\count;
use core\count\generate;
class square extends generate{
    public function set(){
        $this->data['volume']=$this->data['var1']*$this->data['var1'];
    }
}