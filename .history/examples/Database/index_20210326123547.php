<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "blogapp";

// two ways to connect to the database

//procedural style
$mysqli =  mysqli_connect($host, $username, $password, $database);
$sql = "SELECT * FROM posts";
mysqli_query($mysqli, $sql);


//object oriented style (recommended)
//$mysqli = new mysqli($host, $username, $password, $database);