<?php
interface drawinterface{
    function generate();
}
abstract class draw implements drawinterface{
    public $data;
    function __construct(array $data){
        $this->data=$data;
    }
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
class drawsquare extends draw{
    Public function generate(){
        $im=imagecreate($this->data['v1'],$this->data['v1']);
        imagecolorallocate($im,$this->data['color'][0],$this->data['color'][1],$this->data['color'][2]);
        return $this->returnName($im);
    }
}
class drawrectangle extends draw{
    public function generate(){
        if($this->data['v2']!==0){
            $im=imagecreate($this->data['v1'],$this->data['v2']);
            imagecolorallocate($im,$this->data['color'][0],$this->data['color'][1],$this->data['color'][2]);
            return $this->returnName($im);
        }else{
            die('v2 is undefined for rectangle with id '.$this->data['id']);
        }
    }
}
class drawcircle extends draw{
    public function generate(){
        $image = ImageCreate($this->data['v1'],$this->data['v1']); 
        $bg = ImageColorAllocate($image, 255, 255, 255);
        $black = ImageColorAllocate($image, $this->data['color'][0], $this->data['color'][1],$this->data['color'][2]); 
        ImageArc($image, $this->data['v1']/2, $this->data['v1']/2, $this->data['v1'], $this->data['v1'], 0, 360, $black); 
        ImageFillToBorder($image, $this->data['v1']/2, $this->data['v1']/2, $black, $black);
        return $this->returnName($image);
    }
}
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