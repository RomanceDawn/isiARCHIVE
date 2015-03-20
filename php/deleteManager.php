<?php

session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
require_once '../php/QueryManager.class.php';
if (isset($_POST)) {
    $id = intval($_POST['id']);
    if(isset($_POST['indice']))
    {
	$indice=intval($_POST['indice']);
	echo "APRESSSSSSSSSS";
	if (isset($_SESSION['rapports'])) {
	   if (isset($_SESSION['rapports'][$indice])) 
	   {
	       unset($_SESSION['rapports'][$indice]);
	       $taille=count($_SESSION['rapports']);
	       $tabEnd = array_slice ($_SESSION['rapports'], $taille-$indice, $taille);
	       $tabDeb	= array_slice ($_SESSION['rapports'], 0, $taille-$indice);
	       $_SESSION['rapports']=array_merge($tabEnd,$tabDeb);
	   }
	   
	   
	}
    }


    
    $name_server = QueryManager::getServer_Name($id);
    //echo $name_server;
    unlink('../rapports/' . $name_server);
    QueryManager::delete($id);
}

