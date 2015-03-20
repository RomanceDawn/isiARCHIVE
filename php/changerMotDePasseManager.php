<?php

session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}

include './QueryManager.class.php';


$login = $_SESSION['login'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$newPassword2 = $_POST['newPassword2'];

if ($oldPassword == "")
{
    header("Location: ../pages/modifierMotDePasse.php?error_mdp=3");
} 
else if ($newPassword == "")
{
    header("Location: ../pages/modifierMotDePasse.php?error_mdp=4");
} 
else if ($newPassword2 == "")
{
    header("Location: ../pages/modifierMotDePasse.php?error_mdp=5");
} 
else if ($newPassword == $newPassword2)
{
    if(strlen($newPassword)>3)
    {
	 $val = QueryManager::searchUser($login, $oldPassword);
	if ($val == $login) 
	{
	    $newPassword=  md5($newPassword);
	    QueryManager::updatePasswordUser($login, $newPassword);
	    header("Location: ../pages/modifierMotDePasse.php?succes=1");
	}
	else {
	    header("Location: ../pages/modifierMotDePasse.php?error_mdp=1");
	}
    }
    else
    {
	 header("Location: ../pages/modifierMotDePasse.php?error_mdp=6");
    } 
} 
else
{
	header("Location: ../pages/modifierMotDePasse.php?error_mdp=2");
}
?>