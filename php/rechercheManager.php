<?php

session_start();
require_once('Rapport.class.php');

include './QueryManager.class.php';

$motsClefs = "";
$annee = "";
$titre = "";
$auteur = "";
$sujet = "";
$description = "";

if (isset($_POST['motsClefs'])) {
    $motsClefs = $_POST['motsClefs'];
}
if (isset($_POST['annee'])) {
    $annee = $_POST['annee'];
}
if (isset($_POST['titre'])) {
    $titre = $_POST['titre'];
}
if (isset($_POST['auteur'])) {
    $auteur = $_POST['auteur'];
}
if (isset($_POST['sujet'])) {
    $sujet = $_POST['sujet'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
$rapports = QueryManager::search($motsClefs, $annee, $auteur, $titre, $sujet, $description);

if (!$rapports == "") {
    $_SESSION['rapports'] = $rapports;

    header('Location: ../pages/resultatRecherche.php');
} else {
    header("Location: ../pages/recherche.php?no_result=1");
}
?>