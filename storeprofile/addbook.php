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
            <h1>Add book</h1>
        </div>

        <div class="formcontainer">
            <form method="post" action="../helpers/addbookhelper.php" class="search">
                <label for="name">Book Name</label>
                <input type="text" name="name" required><br>

                <label for="author" required>Author</label>
                <input type="text" name="author" required><br>

                <label for="genre" required>Genre</label>
                <select name="genre">
                    <option value="Young Adult">Young Adult</option>
                    <option value="Fiction" selected>Fiction</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Nonfiction">Nonfiction</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                </select><br>

                <label for="year">Year</label>
                <input type="text" name="year" required><br>

                <label for="isbn">ISBN-13</label>
                <input type="text" name="isbn" required><br>

                <label for="price">Price</label>
                <input type="text" name="price" required><br>

                <input type="submit">
                <input type="reset">
            </form>
        </div>

        <?php require_once('..\Shared\footer.php');?>
    </body>
</html>

