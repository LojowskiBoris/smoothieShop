<?php

$pseudo = false;
session_start();
if(isset($_SESSION['idUser']))
{
    include 'bdd_connection.php';
    $requete = $pdo->prepare("
    SELECT `pseudo` FROM `user` WHERE `Id`=?
    ");
    $requete->execute([$_SESSION['idUser']]);
    $pseudo = $requete->fetch();
}
include 'layout.phtml';