<?php
namespace core\validate;
use core\validate\colorvalid;
use core\validate\rectanglevalid;
use core\validate\varvalid;
use core\validate\typevalid;
use core\validate\observervalidator;
class validate{
    private $data; 
    function __construct(array $data){
       $this->data=$data;
    }
    public function validate(){
        if(isset($this->data['count'])){
            $validator=new observervalidator();
            $validator->add(new colorvalid($this->data,'color'));
            $validator->add(new typevalid($this->data,'geometricshapetype'));
            $validator->add(new varvalid($this->data,'var1'));
            $validator->add(new rectanglevalid($this->data,'var2'));
            $validator->valdateStart();
            return true;
        }
        return false;
    }
}
