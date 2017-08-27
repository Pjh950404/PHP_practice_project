<?php
require_once 'dbconnect.php';

$emailCheck = strip_tags($_POST['email']);
$emailCheck = $db->real_escape_string($_POST['email']);

$query = $db->query("SELECT user_id, username, email, password FROM tbl_users WHERE email='$emailCheck'");
$row=$query->fetch_array();

if(filter_var($emailCheck, FILTER_VALIDATE_EMAIL)){
    if(!$row['email'] == $emailCheck)
    {
        echo('Ok');
    }
    else{
        echo('NOk');
    }
}

else{
    echo('Regular');
}


/*
if($row['email'] == FALSE){
    echo('NOk');
}

else{
    if(!filter_var($row['email'], FILTER_VALIDATE_EMAIL) ){
        echo('Regular');
    }
    else{
        echo('Ok');
    }
}
*/
//echo filter_var($row['email'], FILTER_SANITIZE_EMAIL);
?>