<?php
require('core/DB.php');
require('core/count.php');
require('draw/draw.php');
require('core/contet.php');
require('core/CTemplate.php');
require('core/validation.php');
$valdate=new validate($_POST);
$template=new CTemplate('show.htm');
$listOfObject= new listOfObjects();
$view=new view();
$objects=$view->show($listOfObject->showobjects());
$template->CAdd('[#heder#]',sectionGenarate::section('header.htm'));
$template->CAdd('[#footer#]',sectionGenarate::section('footer.htm'));
$template->CAdd('[#cont#]',count($objects));
$template->CLoop('objects',$objects);
echo $template->CGet();
?>
