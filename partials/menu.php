<nav>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <?php
        //check if the user is logged in
        if ($ThereIsUser) {
            echo '
            <li>
                <a href="logout.php">Logout</a>
            </li>
            '; 
            //check if the user is an admin
            if ($user->isAdmin()) {
                echo '
                <li>
                    <a href="admin.php">Admin</a>
                </li>
                ';
            }  
        }else{
            echo '
            <li>
                <a href="register.php">Register</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
            ';
        }
        ?>
    </ul>
</nav>