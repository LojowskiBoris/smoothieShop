<?php
include "bdd_connection.php";

$requete = $pdo->prepare("
SELECT * FROM `product`
");

$requete -> execute();

$produits = $requete->fetchAll();





$template = 'recette';
include 'layout.php';


/*
SELECT
  *,
  IF(
    (
      Id IN(
      SELECT
        Id_product
      FROM
        favoris
      WHERE
        Id_user = 4
    )
    ),
    'true',
    'false'
  ) AS inFavoris
FROM
  `product`
*/


