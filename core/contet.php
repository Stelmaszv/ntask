<?php
class view{
    public function show(array $items){
        foreach ($items as $key => $value){
            $img=new drawimg($items[$key]);
            $items[$key]['img']=$img->showObjects();
        }
        return $items;
    }
}
class sectionGenarate{
    static function section($place){
        $section= $template=new CTemplate($place);
        return $section->CGet();
    }   
}