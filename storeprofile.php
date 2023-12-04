<?php 
    #test connection to the DB
    #should throw error on index.php
    #if doesnt work
    include "helpers/conn.php"; 
    $conn = connection();

    session_start();
?>

<html>
    <head>
        <link href='CSS\footer.css' rel="stylesheet">
        <link href='CSS\header.css' rel="stylesheet">
        <link href='CSS\storeprofile.css' rel="stylesheet">
    </head>

    <body>
        <?php require('Shared\header.php'); ?>

        <?php require('Shared\footer.php'); ?>
    </body>
</html>
