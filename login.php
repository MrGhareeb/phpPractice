<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "./partials/head.php"; ?>
    <title>Blog App</title>

    <style>
        body {
            margin: 0;
            padding: 0;

        }

        .form-box {
            background-color: white;
            box-shadow: 0 0 10px 0 black;
            margin: 0 auto;
        }

        .form-inline {
            
            margin-top: 1em;
            display: flex;
            flex-flow: column wrap;
            align-items: center;
        }

        .form-inline input {
            margin-top: 0.5em;
        }
    </style>
</head>

<body>
    <?php
    //include the user class
    include_once("./Models/User.php");
    //check if the request is post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //get the data
        $email = $_POST['email'];
        $password = $_POST['password'];
        //create an instance of user class
        $user = new User();
        //try to login the user
        $loggedIn = $user->login($email, $password);
        //check if the user is logged in
        if ($loggedIn) {
            //redirect the user to the index page
            header("Location: ./index.php");
            //echo "loggedIn is true";
        }else{
            echo "Logging in failed";
        }
    }
    ?>
    <?php include_once("./partials/menu.php"); //include the navigation?>
    <br><br>
    <div class="form-box">
        <form class="form-inline" method="POST">
            <label for="">Email:</label>
            <input type="email" name="email" required>
            <label for="">password:</label>
            <input type="password" name="password" required>
            <input type="submit" name="submitted">
        </form>
    </div>
    

    <?php include_once "./partials/footer.php"; //include the footer ?>

</body>

</html>