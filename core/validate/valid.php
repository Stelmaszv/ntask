<?php
namespace core\validate;
abstract class valid{
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
    abstract function validaction();
} 