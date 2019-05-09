<?php

// //INSCRIPTION
// function hashPassword($password)
// {
// /*
//     * Génération du sel, nécessite l'extension PHP OpenSSL pour fonctionner.
//     *
//     * openssl_random_pseudo_bytes() va renvoyer n'importe quel type de caractères.
//     * Or le chiffrement en blowfish nécessite un sel avec uniquement les caractères
//     * a-z, A-Z ou 0-9.
//     *
//     * On utilise donc bin2hex() pour convertir en une chaîne hexadécimale le résultat,
//     * qu'on tronque ensuite à 22 caractères pour être sûr d'obtenir la taille
//     * nécessaire pour construire le sel du chiffrement en blowfish.
// */
//     $salt = '$2y$11$' .substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22); 
//     // Voir la documentation de crypt() : http://devdocs.io/php/function.crypt
//     return crypt($password, $salt);
// }


// if(array_key_exists('pseudo',$_POST) && array_key_exists('mail',$_POST) && array_key_exists('mdp',$_POST) && !empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mdp']))
// {
//     $result =['result' => false];
//     include "bdd_connection.php";

//     $pseudo = $_POST['pseudo'];
//     $mail = $_POST['mail'];
//     $mdp = $_POST['mdp'];
//     $mdp = hashPassword($mdp);

//     $requete = $pdo->prepare("
//     SELECT `Id` FROM `user` WHERE `mail`=?
//     ");
//     $requete->execute([$mail]);
//     $user = $requete->fetch();
//     if(!$user)
//     {
//         $requete = $pdo->prepare("
//         INSERT INTO `user`(`pseudo`, `mail`, `password`) VALUES (?,?,?)
//         ");
//         $requete->execute([$pseudo,$mail,$mdp]);
//         $idUser = $pdo->lastInsertId();
            // session_start();
//         $_SESSION['idUser'] = stripslashes(htmlspecialchars($idUser));
//         $result =['result' => true];

//         
//     }
//     echo json_encode($result);
// }


//CONNECTION
function verifyPassword($password, $hashPassword)
{
    return crypt($password, $hashPassword) == $hashPassword;
}

if(array_key_exists('mail',$_POST) && array_key_exists('mdp',$_POST) && !empty($_POST['mail']) && !empty($_POST['mdp']))
{
    $result =['result' => false];
    include "bdd_connection.php";

    $mail = $_POST['mail'];

    $requete = $pdo->prepare("
    SELECT `Id`,`password` FROM `user` WHERE `mail`=?
    ");
    $requete->execute([$mail]);
    $user = $requete->fetch();

    $mdp = $user['password'];
    if(verifyPassword($_POST['mdp'],$mdp))
    {
        session_start();
        $_SESSION['idUser'] = stripslashes(htmlspecialchars($user['Id']));
        $result =['result' => true];
    }
    echo json_encode($result);
}

