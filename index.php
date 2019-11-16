<?php
require 'vendor/autoload.php';
use core\content\CTemplate;
use core\content\sectionGenarate;
use core\validate\validate;
use core\count\mainCount;
$template=new CTemplate('templete/index.htm');
$template->CAdd('[#header#]',sectionGenarate::section('templete/header.htm'));
$template->CAdd('[#footer#]',sectionGenarate::section('templete/footer.htm'));
$valdate=new validate();
if($valdate->validate($_POST)){
    $result=new mainCount($_POST);
    header('location:show.php');
}
echo $template->CGet();
?>

