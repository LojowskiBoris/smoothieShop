<?php
include "bdd_connection.php";
$template = 'recette';
include 'layout.php';
if(!isset($_SESSION['idUser']))
{
    $favoris=false;
}
else
{
    $IdUser = $_SESSION['idUser'];

    $requete = $pdo->prepare("
    SELECT `Id_product` FROM `favoris` WHERE `Id_user`=?
    ");
    $requete->execute([$IdUser]);
    $IdProduct = $requete->fetchAll();

    if(empty($IdProduct))
    {
        $favoris=false;
    }
    else
    {
        $favoris ="";
        for($i=0;$i<count($IdProduct);$i++)
        {
            $favoris .= $IdProduct[$i]['Id_product'];
            $favoris .= ',';
        }
        $favoris = substr($favoris, 0, -1);
        
        $query = ('SELECT `name` FROM `product` WHERE Id IN (' . $favoris . ')');
        $requete = $pdo->prepare($query);
        $requete->execute();
        $favoris = $requete->fetchAll();
        var_dump($favoris);
    }
}

