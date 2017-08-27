<?php
include_once("config/config.inc.php");
$page =!isset($_GET['page']) ?"roster":$_GET['page'];
$fileName="Controller/".$page."Controller.php";
if(file_exists($fileName))
{
    include_once($fileName);
    $className= $page."Controller";
    if(class_exists($className))
    {
        $objController = new $className(DATA_SOURCE);  
        $objController->arrParams=$_GET;                  
        $objController->displayData(); 
    }
}
    