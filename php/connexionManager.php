*-<?php

session_start();

if (!empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
} else if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    include './QueryManager.class.php';
    $login = $_POST["login"];
    $password = $_POST["password"];
    $password=md5($password);
    $co = QueryManager::connection("$login", "$password");
    //echo "co : " . $co;
    if ($co != "") {

        $_SESSION['login'] = $login;
        header('Location: ../pages/multiUpload.php');
    } else {
        header('Location: ../pages/connexion.php');
    }
} else {
    //print_r($_POST);
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
     $_SESSION['errorConnexion'] = true;
    header('Location: ../pages/connexion.php');
    exit("Erreur lors de la connexion.");
}