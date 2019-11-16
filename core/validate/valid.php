<?php
namespace core\validate;
use core\interfaces\validiterface;
abstract class valid implements validiterface{
    protected $data;
    protected $validval;
    function __construct($data,string $validval){
        $this->data=$data;
        $this->validval=$validval;
    }
    function valid(){
        if($this->data[$this->validval]){
            $this->validaction();
        }else{
            die($this->validval.' is undefined');
        }
    }
} 