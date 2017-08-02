<?php
$DBhost="localhost";
$DBuser="root";
$DBpass="dkgodgod1";
$DBname="users";

$db = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);

if($db->connect_errno){
  die("ERROR: -> ".$db->connect_error);
}
?>
