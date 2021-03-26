<?php
//include the user class
include_once("./Models/User.php");
//create a new instance of the user
$user = new User();
//logout the user
$user->logout();
//redirect the user to the index page
header("Location: ./index.php");