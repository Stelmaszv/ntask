<?php
namespace core\count;
use core\interfaces\miancountinterdface;
abstract class generate implements miancountinterdface{
    protected $data;
    function __construct($data){
        $this->data=$data;
        $this->set();
    }
    public function returndata(){
        return $this->data;
    }
}