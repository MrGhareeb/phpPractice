<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "blogapp";

// two ways to connect to the database

//procedural style
$con =  mysqli_connect($host, $username, $password, $database);
$sql = "SELECT * FROM posts";

if ($result = mysqli_query($con, $sql)) {
  while ($obj = mysqli_fetch_object($result)) {
    echo "Post: ". $row->post_title . "<br>";
  }
  mysqli_free_result($result);
}

mysqli_close($con);

//object oriented style (recommended)
//$mysqli = new mysqli($host, $username, $password, $database);