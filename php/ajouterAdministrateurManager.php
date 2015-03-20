<?php

session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}

include './QueryManager.class.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($login == "")
{
    header("Location: ../pages/ajouterAdministrateur.php?error_form=1");
} 
else if ($password == "")
{
    header("Location: ../pages/ajouterAdministrateur.php?error_form=2");
} 
else if ($password2 == "")
{
    header("Location: ../pages/ajouterAdministrateur.php?error_form=3");
} 
else if ($password == $password2)
{
    if(strlen($password)>3)
    {
	 $val = QueryManager::searchUser($login);
	if ($val == "") 
	{
	    $password=  md5($password);
	    QueryManager::insertUser($login, $password);
	    header("Location: ../pages/ajouterAdministrateur.php?succes=1");
	}
	else {
	    header("Location: ../pages/ajouterAdministrateur.php?error_form=5");
	}
    }
    else
    {
	 header("Location: ../pages/ajouterAdministrateur.php?error_form=6");
    }
   
} 
else
{
	header("Location: ../pages/ajouterAdministrateur.php?error_form=4");
}
?>