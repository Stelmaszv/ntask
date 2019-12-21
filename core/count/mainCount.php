<?php
namespace core\count;
use core\count\listOfObjects;
use core\count\square;
use core\count\rectangle;
use core\count\circle;
class mainCount{
    private $datainObjects;
    private $listOfObjects;
    function __construct(array $data){
        $this->listOfObjects=new listOfObjects();
        $objects['square']= new square($data);
        $objects['rectangle']= new rectangle($data);
        $objects['circle']= new circle($data);
        $this->datainObjects=$objects[$data['geometricshapetype']];
        $this->addObjects();
    }
    public function addObjects(){
        $this->listOfObjects->create($this->datainObjects->returndata());
    }
}