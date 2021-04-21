<?php
$ctr="";
$action="";
if(!(isset($_GET['ctr'])))
{
    $ctr="salle";
}else{
    $ctr=$_GET['ctr'];
}
if(!(isset($_GET['action'])))
{
    $action="index";
}else{
    $action=$_GET['action'];
}

$file="controllers/".$ctr.".php";

if(file_exists($file)){
    require_once $file;
    $ctr=ucfirst($ctr);
    if(class_exists($ctr)){
        $obj=new $ctr;
    }
    if(method_exists($obj,$action)){
        $obj->$action();
    }
}
?>
