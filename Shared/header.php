<!DOCTYPE html>

<html>
    <head>
        <link href='CSS\header.css' rel="stylesheet">
    </head>

    <body>
        <div class = "topnav">
            <a class="active" href="index.php">Home</a>
            <a href="search.php">Search</a>
            
            <?php
                if (isset($_SESSION["loggedin"]) == FALSE)
                {
                    echo("<a href='login.php'>Login</a>");
                }
                else
                {
                    echo("<a href='helpers/logout.php'>Logout</a>");
                }
            ?>
        </div>
    </body>
</html>