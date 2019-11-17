<?php
namespace core\validate;
use core\validate\valid;
class rectanglevalid extends valid{
    function valid(){
        if($this->data['geometricshapetype']==='rectangle' &&  $this->data['var2']===0){
            die('v2 is undefined for rectangle !');
        }
    }
    function validaction(){ }
}
