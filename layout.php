<?php

$pseudo = false;
session_start();

if(!isset($_SESSION['idUser']))
{
    $allFavoris=false;
}
else
{

    include 'bdd_connection.php';
    $requete = $pdo->prepare("
    SELECT `pseudo` FROM `user` WHERE `Id`=?
    ");
    $requete->execute([$_SESSION['idUser']]);
    $pseudo = $requete->fetch();

    if($template == 'recette')
    {
        $IdUser = $_SESSION['idUser'];
        $requete = $pdo->prepare("
        SELECT `Id_product` FROM `favoris` WHERE `Id_user`=?
        ");
        $requete->execute([$IdUser]);
        $IdProduct = $requete->fetchAll();

        if(empty($IdProduct))
        {
            $allFavoris=false;
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

            $allFavoris = array();
            for($i=0;$i<count($favoris);$i++)
            {
                array_push($allFavoris,$favoris[$i]['name']);
            }
        }
    }
}

include 'layout.phtml';