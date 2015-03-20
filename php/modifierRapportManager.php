<?php

session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}

include './Rapport.class.php';
include './QueryManager.class.php';
$date_creation = $_POST['date'];
if($date_creation!="0000")
{
    echo $date_creation;
    $date_creation = $date_creation . '-01-01';
}
$sujet = $_POST['sujet'];
$description = $_POST['description'];
$auteur = $_POST['auteur'];
$titre = $_POST['titre'];
$mots_clefs = $_POST['motscles'];
$texte = $_POST['texte'];
$id = $_POST['id'];



$_SESSION['success'] = 1;
QueryManager::updateRapport($id,$date_creation,$sujet,$description,$auteur,$titre,$mots_clefs,$texte);
header("Location: ../pages/modifierRapport.php?id=$id");