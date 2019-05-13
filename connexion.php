<?php

function verifyPassword($password, $hashPassword)
{
    return crypt($password, $hashPassword) == $hashPassword;
}

if(array_key_exists('mail',$_POST) && array_key_exists('mdp',$_POST) && !empty($_POST['mail']) && !empty($_POST['mdp']))
{
    $result =['result' => false];
    include "bdd_connection.php";

    $mail = $_POST['mail'];

    $requete = $pdo->prepare("
    SELECT `Id`,`password` FROM `user` WHERE `mail`=?
    ");
    $requete->execute([$mail]);
    $user = $requete->fetch();

    $mdp = $user['password'];
    if(verifyPassword($_POST['mdp'],$mdp))
    {
        session_start();
        $_SESSION['idUser'] = $user['Id'];
        $result =['result' => true];
    }
    echo json_encode($result);
}
else
{
    $template = 'connexion';
    include "layout.php";
}


