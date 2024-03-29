<?php
namespace core\draw;
abstract class draw{
    public $data;
    function __construct(array $data){
        $this->data=$data;
    }
    abstract function generate();
    public function startdraw(){
        $this->preapare();
        return $this->generate();
    }
    private function preapare(){
        if(!is_dir('objects')){
            mkdir("objects", 0700);
        }
        $this->data['name']=$this->data['types'].'.'.$this->data['id'].'.png';
        $this->data['color']=explode(':',$this->data['color']);
        fopen('./objects/'.$this->data['name'].'', 'w');
        
    }
    protected function returnName($im){
        imagepng($im,'objects/'.$this->data['name']);
        return 'objects/'.$this->data['name'];
    }
}