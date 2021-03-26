<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "./partials/head.php";?>
    <title>Blog App</title>
</head>

<body>
    <?php include_once "./partials/menu.php";?>
    <a href="examples/" style="text-decoration: none; color: #303030">To Examples</a><br>
    <a href="examples/Basics/" style="text-decoration: none; color: #303030">To Examples - Basics</a><br>
    <a href="examples/Forms/" style="text-decoration: none; color: #303030">To Examples - Forms</a><br>
    <a href="examples/Database/" style="text-decoration: none; color: #303030">To Examples - Database</a><br><br><br>
    <?php

    include_once("Database.php");

    $db = Database::getInstance();
    $conn = $db->getConnection();
    $results = $conn->query("SELECT * FROM POSTS");

    $firstRow = $results->fetch_object();

    if (empty($firstRow)) {
        echo "no posts";
    } else {
        echo "Post: ". $firstRow->post_title . "<br>";
        while ($row = $results->fetch_object()) {
            echo "Post: ". $row->post_title . "<br>";
        }
    }

    //TODO: create the models for each table with crud functions
    //TODO: Login (authentication and authorization with sessions)
    //TODO: registration (create a new user with two type admin and normal)
    //TODO: upload files to the server (imgs)

    ?>

    <?php include_once "./partials/footer.php";?>
</body>

</html>