<?php

$template = "contact";
include "layout.phtml";

// $retour = mail('issam.elalaoui85@gmail.com', 'Envoi depuis le site SmoothieMaker', $_POST['message'], 'From : webmaster@smoothiesmaker.fr');
//     if ($retour) {
//         return $envoiOk = '<p>Votre message a été envoyé.</p>';
//     }else{
//         return $envoiFail = '<p>Erreur lors l\'envoi de votre message.</p>';
//     }

$message = $_POST['message'];
$mail = $_POST['email'];

if (isset($message)) {
    $position_arobase = strpos($mail, '@');
    if($position_arobase === false)
        echo $mailIncorrect = '<p>Votre email est incorrect.</p>';
    else {
        $retour = mail('issam.elalaoui85@gmail.com','Envoi depuis le site SmoothieMaker', $message, 'From : ' . $mail);
        if($retour)
            return $envoiOk = '<p>Votre message a été envoyé.</p>';
        else
            return $envoiFail = '<p>Erreur lors l\'envoi de votre message.</p>';
    }
}
