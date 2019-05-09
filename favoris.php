<?php
include "bdd_connection.php";

$productName = $_POST['productName'];

session_start();
if(!isset($_SESSION['idUser']))
{
    header('Location: login.php');
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
INSERT INTO `user_liste`(`Id_User`, `Id_Product`) VALUES (?,?)
");

$requete->execute([$IdUser, $IdProduct]);



?>