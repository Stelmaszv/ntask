<?php
namespace core\draw;

class drawimg{
    private $img;
    public function __construct(array $data){
        $objects['square']=new drawsquare($data);
        $objects['rectangle']=new drawrectangle($data);
        $objects['circle']=new drawcircle($data);
        $this->img=$objects[$data['types']]->startdraw();
    }
    public function showObjects(){
        return $this->img;
    }
}