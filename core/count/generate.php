<?php
namespace core\count;
abstract class generate{
    protected $data;
    function __construct($data){
        $this->data=$data;
        $this->set();
    }
    public function returndata(){
        return $this->data;
    }
    abstract function set();
}