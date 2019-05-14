<?php
include "bdd_connection.php";
$template = 'recette';
include 'layout.php';
if(!isset($_SESSION['idUser']))
{
    $IdProduct=false;
}
else
{
    $IdUser = $_SESSION['idUser'];

    $requete = $pdo->prepare("
    SELECT `Id_product` FROM `favoris` WHERE `Id_user`=?
    ");
    $requete->execute([$IdUser]);
    $IdProduct = $requete->fetchAll();
}
if(empty($IdProduct))
{
    $IdProduct=false;
}
else
{
    $requete = $pdo->prepare("
    SELECT `Id_product` FROM `favoris` WHERE `Id_user`=?
    ");
    $requete->execute([$IdUser]);
    $IdProduct = $requete->fetchAll();
}
var_dump($IdProduct);