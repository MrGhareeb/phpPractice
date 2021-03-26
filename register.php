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
    include_once("./Models/User.php");
    //check if the method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //get the values the user entered
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //create a new user instance
        $user = new User();
        //register the user
        $isRegistered = $user->register($f_name, $l_name, $email, $password, 2);
        //check if the register was successful
        if($isRegistered){
            //redirect the user to the index page
            header("Location: ./index.php");
        }
        //if the register was unsuccessful print a massage
        else{
            echo "Register Failed";
        }

    }
    ?>
    
    <?php include_once("./partials/menu.php"); //include the navigation ?>
    <br><br>
    <div class="form-box">
        <form class="form-inline" method="POST">
            <label for="">first name:</label>
            <input type="text" name="f_name" required>
            <label for="">last name:</label>
            <input type="text" name="l_name" required>
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