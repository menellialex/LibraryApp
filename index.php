<!-- This is the root page
     go to localhost/LibraryApp/ and this will show
-->

<?php 
    #test connection to the DB
    #should throw error on index.php
    #if doesnt work
    include "helpers/conn.php"; 
    connection();

    session_start();

    require('Shared\header.php');

    if ($_SESSION['loggedin'] == FALSE)
    {
        header("Location: /libraryapp/login.php");
    }
    else
    {
        echo("<h1>Welcome " . $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . "!</h1>");
    }
?>

<html>
    <head>

    </head>

    <body>

    </body>
</html>

<?php 
    require('Shared\footer.php');
?>