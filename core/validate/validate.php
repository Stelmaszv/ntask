<?php
namespace core\validate;
use core\validate\colorvalid;
class validate{
    private $data; 
    function __construct(array $data){
       $this->data=$data;
    }
    public function validate(){
        if(isset($this->data['count'])){
            colorvalid::valid($this->data['color']);
            if($this->data['var1']<1){
                die('v1 is undefined !');
            }
            if($this->data['var2']<1 && $this->data['geometricshapetype']==='rectangle'){
                die('v2 is undefined for rectangle !');
            }
            if(!$this->data['geometricshapetype']){
                die('choose fig !');
            }
            return true;
        }
        return false;
    }
}