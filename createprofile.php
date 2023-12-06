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
            <h1>Create User Profile</h1>
            <form action="helpers/createprofilehelper.php" method="post" class="forms">
                <label for="email">Email Address:</label>
                <input type="text" name="email" placeholder="Email" required><br><br>

                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" placeholder="First Name" required><br><br>

                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" placeholder="Last Name" required><br><br>

                <label for="addr">Address:</label>
                <input type="text" name="addr" placeholder="Address" required><br><br>

                <label for="country">Country:</label>
                <input type="text" name="country" placeholder="Country" required><br><br>

                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Username" required><br><br>
            
                </br></br>

                <input type="submit" class="submitbutton">
                <input type="reset" class="submitbutton"><br><br>

                <a href="createprofile.php">Already have an account? Sign in here!</a><br><br>

                <p>If you would like to create a store profile, please contact sales@libraryapp.com</p>
            </form>
        </div>

        <?php require('Shared\footer.php'); ?>
    </body>
</html>