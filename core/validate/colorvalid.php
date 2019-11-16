<?php
namespace core\validate;
class colorvalid{
    static function valid(string $color){
        if($color){
            if(!preg_match('/^[0-9][0-9][0-9]:[0-9][0-9][0-9]:[0-9][0-9][0-9]$/D',$color)){
                die('color must be in format 000:000:000');
            }
        }else{
            die('color is undefined !');
        }
    }
}