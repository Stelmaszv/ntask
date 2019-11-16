<?php
require 'vendor/autoload.php';
use core\content\CTemplate;
use core\content\sectionGenarate;
use core\content\view;
use core\count\listOfObjects;
$template=new CTemplate('show.htm');
$view=new view();
$listOfObject= new listOfObjects();
$objects=$view->show($listOfObject->showobjects());
$template->CAdd('[#header#]',sectionGenarate::section('header.htm'));
$template->CAdd('[#footer#]',sectionGenarate::section('footer.htm'));
$template->CAdd('[#count#]',count($objects));
$template->CLoop('objects',$objects);
echo $template->CGet();
?>
