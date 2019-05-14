<?php
  

if($_POST){
    $from = $_POST['email']; 
    $message = $_POST['message'];
    $position_arobase = strpos($from, '@');
        if ($position_arobase === false ) {
            $result = false;
        }else{
            
            $to = "ibrainpop@ibrainblog.com"; 

            $headers = "From:" . $from;
            mail($to,$message,$headers);
            $result = true;
        
            }
    
}


$template = 'contact';
include "layout.php";
