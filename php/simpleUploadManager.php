<?php

session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}


$allowed_files_extensions = array(
    "pdf",
);
ini_set('memory_limit', '-1');
if (!empty($_FILES) && !empty($_POST)) {
    $name_origin = $_FILES['file']['name'];
    $extension = substr(strrchr($name_origin, '.'), 1);
    if (!in_array(strtolower($extension), $allowed_files_extensions)) {

        header('HTTP/1.1 500 Internal Server Error');
        header('Content-type: text/plain');
        $_SESSION['erreur'] = 1;
        header("Location: ../pages/simpleUpload.php");
        exit("Type de fichier non valide.");
    }
    include './Rapport.class.php';
    include './QueryManager.class.php';
    $date_creation = $_POST['date'];

    $date_creation = $date_creation . '-01-01';
    $date_modification = NULL;
    $sujet = $_POST['sujet'];
    $description = $_POST['description'];
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $mots_clefs = $_POST['motscles'];
    $texte = null;

    $ajouteur = $_SESSION['login'];
    $tempFile = $_FILES['file']['tmp_name'];
    $nom_origin = $_FILES['file']['name'];
    $extension = substr(strrchr($name_origin, '.'), 1);

//generate a random id encrypt it and store it in $rnd_id
//    $random_id_length = 20;
//    $rnd_id = crypt(uniqid(rand(), 1));
//    $rnd_id = strip_tags(stripslashes($rnd_id));
//    $rnd_id = str_replace(".", "", $rnd_id);
//    $rnd_id = strrev(str_replace("/", "", $rnd_id));
//    $rnd_id = substr($rnd_id, 0, $random_id_length);
//    $nom_server = $rnd_id;
    $nom_server = uniqid();

    $targetPath = "../rapports/";
    $targetFile = $targetPath . $nom_server;



    try {
        if ($_POST['texte'] != "") {
            $texte = $_POST['texte'];
        } else {
            include '../parser/parser-texte/Parser.class.php';
            $texte = PdfParser::parseFile($tempFile);
        }

        $texte = iconv('UTF-8', 'UTF-8//IGNORE', $texte);
        include '../parser/parser-metadata/pdf.php';
        $handle = fopen($tempFile, 'rb');
        $pdf = new PdfFileReader($handle);
        foreach ($pdf->get_document_info()->data as $property => $value) {
//            if (is_array($value)) {
//                $value = implode(', ', $value);
//            } else {
//                $value = utf8_encode($value);
//            }
            switch ($property) {
//                case 'title':
//                    $titre = $value;
//                    break;
//                case 'author':
//                    $auteur = $value;
//                    break;
//                case 'keywords':
//                    $mots_clefs = $value;
//                    break;
//                case 'subject':
//                    $sujet = $value;
//                    break;
//                case 'creation_date':
//                    $timestamp = strtotime(substr($value, 2, 8));
//                    $date_creation = date('Y-m-d', $timestamp);
//                    break;
                case 'mod_date':
                    $timestamp = strtotime(substr($value, 2, 8));
                    $date_modification = date('Y-m-d', $timestamp);
                    break;
            }
        }

        fclose($handle);
    } catch (Exception $e) {
        
    }

    $sujet = iconv('UTF-8', 'UTF-8//IGNORE', $sujet);
    $description = iconv('UTF-8', 'UTF-8//IGNORE', $description);
    $auteur = iconv('UTF-8', 'UTF-8//IGNORE', $auteur);
    $titre = iconv('UTF-8', 'UTF-8//IGNORE', $titre);
    $mots_clefs = iconv('UTF-8', 'UTF-8//IGNORE', $mots_clefs);

    if (intval(substr($date_creation, 0, 4)) < 1993) {
        unset($date_creation);
    }
    if (intval(substr($date_modification, 0, 4)) < 1993) {

        unset($date_modification);
    }
    $temp = new Rapport($description, $titre, $sujet, $date_creation, $date_modification, $nom_origin, $mots_clefs, $nom_server, $auteur, $ajouteur, $texte);

    $id = QueryManager::insert($temp);
    move_uploaded_file($tempFile, $targetFile);
    //echo $id;
    $_SESSION['success'] = 1;
    header("Location: ../pages/simpleUpload.php");
} else {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    $_SESSION['erreur'] = 1;
    header("Location: ../pages/simpleUpload.php");
    exit("Erreur lors du transfert de fichier.");
}