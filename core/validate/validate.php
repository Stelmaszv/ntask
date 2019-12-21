<?php
namespace core\validate;
use core\validate\colorvalid;
use core\validate\rectanglevalid;
use core\validate\varvalid;
use core\validate\typevalid;
use core\validate\observervalidator;
class validate{
    public function validate($data){
        if(isset($data['count'])){
            $validator=new observervalidator();
            $validator->add(new colorvalid($data,'color'));
            $validator->add(new typevalid($data,'geometricshapetype'));
            $validator->add(new varvalid($data,'var1'));
            $validator->add(new rectanglevalid($data,'var2'));
            $validator->validateStart();
            return true;
        }
        return false;
    }
}
