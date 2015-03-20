<?php

if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    include_once '../php/Rapport.class.php';
include_once '../php/QueryManager.class.php';
$rap = QueryManager::getRapportById($_GET["id"]);

$file_url = '../rapports/'.$rap->getNomServ();
header('Content-Type: application/pdf');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=".$rap->getNomOrigin());
readfile($file_url);
}
else{
    header('Location: ../pages/index.php');
}


