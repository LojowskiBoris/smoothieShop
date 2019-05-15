
<?php
include "bdd_connection.php";

$IdProduct = $_POST['productId'];


session_start();

if(!isset($_SESSION['idUser']))
{
    $result = ['result' => false];
}
else
{
    $IdUser = $_SESSION['idUser'];
    $requete = $pdo->prepare("
    SELECT `Id` FROM `favoris` WHERE `Id_user`=? AND`Id_product`=?
    ");
    $requete->execute([$IdUser,$IdProduct]);
    $favoris = $requete->fetch();

    if(empty($favoris))
    {
        $requete = $pdo->prepare("
        INSERT INTO `favoris`(`Id_user`, `Id_product`) VALUES (?,?)
        ");
        $requete->execute([$IdUser, $IdProduct]);
    }
    $result = ['result' => true];
}
echo json_encode($result);