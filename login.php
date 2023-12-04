<?php 
    #test connection to the DB
    #should throw error on index.php
    #if doesnt work
    include "helpers/conn.php"; 
    connection();

    session_start();

    require('Shared\header.php');
?>

<!DOCTYPE html>

<html>
    <head>
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

                <input type="submit" class="submitbutton">
            </form>
        </div>

        <?php require('Shared\footer.php'); ?>
    </body>
</html>