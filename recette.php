<?php

<?php
include "bdd_connection.php";

$productName = $_POST['productName'];

session_start();
if(!isset($_SESSION['idUser']))
{
    $heart=false;
}
else
{
    $IdUser = $_SESSION['idUser'];

    $requete = $pdo->prepare("
    SELECT Id FROM `product` WHERE `name`= ?
    ");

    $requete->execute([$productName]);

    $IdProduct = $requete->fetch();
    
    $requete = $pdo->prepare("
    DELETE FROM `favoris` WHERE `Id_user`=? AND`Id_product`=?
    ");
    $requete->execute([$IdUser, $IdProduct['Id']]);
}



$template = 'recette';
include 'layout.php';
