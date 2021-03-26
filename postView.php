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
    <?php 
    
    include_once("./partials/menu.php");
    include_once('./Models/Post.php');

    $post = new Post();
    $post->getPostById($_GET["id"]);
    echo $post->getPostTitle();
    
    ?>

    <h1 style="text-align: center;"><?php echo $post->getPostTitle(); ?></h1>
    <div class="post-image" style="background-image: url('<?php echo(($post->getPostImg() !== null) ?  $post->getPostImg() : 'http://localhost/dbp2%20practice/assets/img/placeHolder.png') ?>');"></div>
    <br><br>
    <p class="post-body"><?php echo $post->getPostBody(); ?></p>
    
    <?php include_once "./partials/footer.php"; ?>
</body>

</html>