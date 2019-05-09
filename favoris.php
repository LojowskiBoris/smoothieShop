<?php
include "bdd_connection.php";

$productName = $_POST['productName'];
$userName = $_POST['userName'];

$requete = $pdo->prepare("
SELECT Id FROM `product` WHERE `name`= ?
");

$requete->execute([$productName]);

$IdProduct = $requete->fetch();

$requete = $pdo->prepare("
SELECT Id FROM `user` WHERE `name`= ?
");

$requete->execute([$userName]);
$IdUser = $requete->fetch();

$requete = $pdo->prepare("
INSERT INTO `user_liste`(`Id_User`, `Id_Product`) VALUES (?,?)
");

$requete->execute([$IdUser, $IdProduct]);



?>