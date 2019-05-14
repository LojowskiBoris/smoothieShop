<?php
include "bdd_connection.php";

$productName = $_POST['productName'];

session_start();
if(!isset($_SESSION['idUser']))
{
    $result = ['result' => false];
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
    SELECT `Id` FROM `favoris` WHERE `Id_user`=? AND`Id_product`=?
    ");
    $requete->execute([$IdUser,$IdProduct['Id']]);
    $favoris = $requete->fetch();

    if(empty($favoris))
    {
        $requete = $pdo->prepare("
        INSERT INTO `favoris`(`Id_user`, `Id_product`) VALUES (?,?)
        ");
        $requete->execute([$IdUser, $IdProduct['Id']]);
    }
    $result = ['result' => true];
}
echo json_encode($result);



