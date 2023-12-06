<?php 
    #test connection to the DB
    #should throw error on index.php
    #if doesnt work
    include "helpers/conn.php"; 
    connection();

    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <link href='CSS\footer.css' rel="stylesheet">
        <link href='CSS\header.css' rel="stylesheet">
        <link href='CSS\login.css' rel="stylesheet">
    </head>

    <body>
        <?php require('Shared\header.php'); ?>

        <div class="centered">
            <h1>Login</h1>
            <form action="helpers/authenticate.php" method="post" class="forms" style="display: inline-block">
                <label for="email">Email Address:</label>
                <input type="text" name="email" placeholder="Email" required>
            
                </br></br>

                <input type="submit" class="submitbutton"><br><br>

                <a href="createprofile.php">Don't have an account? Create a profile here!</a>
            </form>
        </div>

        <?php require('Shared\footer.php'); ?>
    </body>
</html>