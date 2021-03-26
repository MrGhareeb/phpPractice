<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "./partials/head.php"; ?>
    <title>Blog App</title>
</head>

<body>
    <?php include_once "./partials/menu.php"; ?>
    <a href="examples/" style="text-decoration: none; color: #303030">To Examples</a><br>
    <a href="examples/Basics/" style="text-decoration: none; color: #303030">To Examples - Basics</a><br>
    <a href="examples/Forms/" style="text-decoration: none; color: #303030">To Examples - Forms</a><br>
    <a href="examples/Database/" style="text-decoration: none; color: #303030">To Examples - Database</a><br><br><br>

    <?php 
    if ($ThereIsUser) {
        echo "<h1>Welcome ".$user->getFName()." ".$user->getLName()."</h1>";
    }else{
        echo "<h1>Welcome Guest</h1>";
    }
    ?>

    <h1>Posts</h1>
    <div class='posts'>
    <?php
    //TODO: create the models for each table with crud functions
    //TODO: Login (authentication and authorization with sessions)
    //TODO: upload files to the server (imgs)
    include_once('./Models/Post.php');
    

    $posts = Post::getAllPosts();
    foreach ($posts as $post) {
        echo "
            <a href='postView.php?id=".$post->getPostId()."' class='post'>
                <h2>".$post->getPostTitle()."</h2>
            </a>
            ";
    }
    ?>
    </div>
    <?php include_once "./partials/footer.php"; ?>
</body>

</html>