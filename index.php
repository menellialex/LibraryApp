<!-- This is the root page
     go to localhost/LibraryApp/ and this will show
-->

<?php 
    #test connection to the DB
    #should throw error on index.php
    #if doesnt work
    include "helpers/conn.php"; 
    connection();

    if ($_SESSION["loggedin"] = FALSE)
    {
        header("Location: /login.php");
    }
?>

<html>
    <head>
    </head>

    <body>
        <?php require_once('Shared\header.php');?>

        <?php require_once('Shared\footer.php');?>
    </body>
</html>