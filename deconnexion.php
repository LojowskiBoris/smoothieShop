<?php
session_start();
if(isset($_SESSION['idUser']))
{
    session_destroy();
}
header('Location: index.php');
exit();
