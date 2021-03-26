<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <style>
    body{
        background-color: #efefef;
        font-family: Arial, sans-serif;
    }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>your opnion matters</h2>
        <label for="email">Email: </label><input type="email" name="email" id="email">
        <label for="name">Name: </label><input type="text" name="name" id="name">
        <input type="submit" value="send">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $isValid = true;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format <br>";
            $isValid = false;
        }

        if (empty($name)) {
            echo "name cannot be empty<br>";
            $isValid = false;
        }

        if ($isValid) {
            echo "we have received your email!!<br>";
        }

    }
    ?>
</body>
</html>