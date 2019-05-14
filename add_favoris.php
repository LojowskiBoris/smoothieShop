<?php
include "bdd_connection.php";

$productName = $_POST['productName'];

session_start();
if(!isset($_SESSION['idUser']))
{
    header('Location: connexion.php');
    exit();
}
else
{
    $IdUser = $_SESSION['idUser'];
}

$requete = $pdo->prepare("
SELECT Id FROM `product` WHERE `name`= ?
");
$requete->execute([$productName]);
$IdProduct = $requete->fetch();

$requete = $pdo->prepare("
INSERT INTO `favoris`(`Id_user`, `Id_product`) VALUES (?,?)
");

$requete->execute([$IdUser, $IdProduct['Id']]);


