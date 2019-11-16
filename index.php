<?php
require 'vendor/autoload.php';
use core\content\CTemplate;
use core\content\sectionGenarate;
use core\validate\validate;
use core\count\mainCount;
$template=new CTemplate('index.htm');
$template->CAdd('[#header#]',sectionGenarate::section('header.htm'));
$template->CAdd('[#footer#]',sectionGenarate::section('footer.htm'));
$valdate=new validate();
if($valdate->validate($_POST)){
    $result=new mainCount($_POST);
    header('location:show.php');
}
echo $template->CGet();
?>

