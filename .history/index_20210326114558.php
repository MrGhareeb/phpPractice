<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="examples/">To Examples</a><br>
    <a href="examples/Basics/">To Examples - Basics</a><br>
    <a href="examples/Forms/">To Examples - Forms</a><br><br><br>
    <?php

    include_once("Database.php");

    $db = Database::getInstance();
    $conn = $db->getConnection();
    $results = $conn->query("SELECT * FROM POSTS where post_id = 5");

    while ($row = $results->fetch_object()) {
        echo "Post: ". $row->post_title . "<br>";
    }


    //TODO: create the models for each table with crud functions
    //TODO: Login (authentication and authorization with sessions)
    //TODO: registration (create a new user with two type admin and normal)
    //TODO: upload files to the server (imgs)

    


    ?>
</body>

</html>