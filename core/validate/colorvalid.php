<?php
namespace core\validate;
use core\validate\valid;
class colorvalid extends valid{
    function validaction( ){
        if(!preg_match('/^[0-9][0-9][0-9]:[0-9][0-9][0-9]:[0-9][0-9][0-9]$/D',$this->data['color'])){
            die('color must be in format 000:000:000');
        }
    }
}