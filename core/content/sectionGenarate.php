<?php
namespace core\content;
class sectionGenarate{
    static function section($place){
        $section= $template=new CTemplate($place);
        return $section->CGet();
    }   
}