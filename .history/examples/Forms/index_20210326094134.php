<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <form method="post">
        <h2>Basic Form with post</h2>
        <label for="name-input">name: </label><input type="text" name="name" id="name-input">
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["name"])) {
            $name = $_POST['name'];
            echo "<p>Hello $name<p/>";
        }
    }
    ?>

    <form method="get">
        <h2>Basic Form with get</h2>
        <label for="name-input">name: </label><input type="text" name="name" id="name-input">
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET["name"])) {
            $name = $_GET['name'];
            echo "<p>Hello $name<p/>";
        }
    }
    ?>

</body>
</html>