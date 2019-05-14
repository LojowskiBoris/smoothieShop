<?php
include 'bdd_connection.php';

$idProduit= $_GET['produit'];

$requete = $pdo->prepare("
SELECT * FROM `product` WHERE Id = ?
");

$requete -> execute([$idProduit]);

$produits = $requete->fetch();

$ingredients = $produits['ingredients'];

$ingredient = explode(",", $ingredients);





$template = 'recette_details';
include 'layout.php';