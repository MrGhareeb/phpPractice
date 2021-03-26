<?php
//include the user class
include_once './Models/User.php';
//start the session
session_start();
// to initialize a user in every page
$user = new User();
// to make sure that there is a user before using $user (i know it sounds Weird, but it works)
$ThereIsUser = $user->initWithSession();

?>
<link rel="stylesheet" href="./assets/css/style.css">