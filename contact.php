<?php
  

if($_POST){
$from = $_POST['email']; // this is the sender's Email address
$message = $_POST['message'];
$position_arobase = strpos($from, '@');
if ($position_arobase === false ) {

     return $result = false;
}else{


    $to = "ibrainpop@ibrainblog.com"; // this is your Email address

    $headers = "From:" . $from;
    mail($to,$message,$headers);
    return $result = true;

mail($to, $subject, $message, $headers);
 
    }
    
}
var_dump($result);
$template = 'contact';
include "layout.php";