<?php
    session_start();

    #include the connection function from conn.php to get 
    include "../helpers/conn.php";
    $conn = connection();
?>

<html>
    <head>
        <link href='..\CSS\footer.css' rel="stylesheet">
        <link href='..\CSS\header.css' rel="stylesheet">
        <link href='..\CSS\search.css' rel="stylesheet">
    </head>

    <body>
        <?php require_once('..\Shared\header.php');?>

        <div class="heading">
            <h1>Remove book</h1>
        </div>

        <div class="formcontainer">
            <form method="post" action="../helpers/deletebookhelper.php" class="search">
                <label for="isbn">ISBN-13</label>
                <input type="text" name="isbn" required><br>

                <input type="submit">
                <input type="reset">
            </form>
        </div>

        <?php require_once('..\Shared\footer.php');?>
    </body>
</html>