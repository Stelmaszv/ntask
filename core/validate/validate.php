<?php
namespace core\validate;
use core\validate\colorvalid;
use core\validate\rectanglevalid;
use core\validate\varvalid;
use core\validate\observervalidator;
class validate{
    function __construct(){
        $this->validator=new observervalidator();
    }
    public function validate(array $data){
        if(isset($data['count'])){
            $this->addobservers($data);
            $this->validator->validateStart();
            return true;
        }
        return false;
    }
    private function addobservers(array $data){
        $this->validator->add(new colorvalid($data,'color'));
        $this->validator->add(new varvalid($data,'geometricshapetype'));
        $this->validator->add(new varvalid($data,'var1'));
        $this->validator->add(new rectanglevalid($data,'var2'));
    }
}
