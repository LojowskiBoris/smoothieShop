<?php
include "bdd_connection.php";

$requete = $pdo->prepare("
SELECT * FROM `product`
");

$requete -> execute();

$produits = $requete->fetchAll();





$template = 'recette';
include 'layout.php';



