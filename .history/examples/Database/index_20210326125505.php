<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "blogapp";

// two ways to connect to the database

//procedural style
echo "THE PROCEDURAL WAY";
$con =  mysqli_connect($host, $username, $password, $database);
$sql = "SELECT * FROM posts";

if ($result = mysqli_query($con, $sql)) {
  while ($row = mysqli_fetch_object($result)) {
    echo "Post: ". $row->post_title . "<br>";
  }
  mysqli_free_result($result);
}

mysqli_close($con);

//object oriented style (recommended)
//create a new instance of mysqli
$mysqli = new mysqli($host, $username, $password, $database);
