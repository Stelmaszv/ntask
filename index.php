<?php
require('core/DB.php');
require('core/count.php');
require('core/contet.php');
require('draw/draw.php');
require('core/CTemplate.php');
require('core/validation.php');
$valdate=new validate($_POST);
$template=new CTemplate('index.htm');
$template->CAdd('[#header#]',sectionGenarate::section('header.htm'));
$template->CAdd('[#footer#]',sectionGenarate::section('footer.htm'));
if($valdate->validate($_POST)){
    var_dump($_POST);
    $result=new mainCount($_POST);
    header('location:show.php');
}
echo $template->CGet();
?>

