<?php
    session_start();
    if (empty($_SESSION['login'])) {
        exit(0);
    }
    
    include './QueryManager.class.php';
    $id = $_POST['id'];
    $rapports=QueryManager::delete($id);
   
?>