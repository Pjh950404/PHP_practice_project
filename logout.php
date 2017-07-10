<?php
session_start();

if (!isset($_SESSION['userSession']))
{
 header("Location: login.php");
}
else if (isset($_SESSION['userSession'])!="")
{
 header("Location: index.php");
}

if (isset($_GET['logout'])) {
 session_unset();
 unset($_SESSION['userSession']);
 header("Location: index.php");
}

?>
