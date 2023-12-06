<?php
    #start session
    session_start();

    if ($_SESSION["loggedin"] == 0)
    {
        header("Location: /LibraryApp/login.php");
    }
?> 

<!DOCTYPE html>

<html>
    <head>
        <script>
            function minSliderChange()
            {
                var slider = document.getElementById("minslider");
                var output = document.getElementById("minpriceoutput");

                output.innerHTML = "$" + slider.value;
            }
            function maxSliderChange()
            {
                var slider = document.getElementById("maxslider");
                var output = document.getElementById("maxpriceoutput");

                output.innerHTML = "$" + slider.value;
            }
        </script>

        <link href='CSS\search.css' rel="stylesheet">
        <link href='CSS\footer.css' rel="stylesheet">
        <link href='CSS\header.css' rel="stylesheet">
    </head>

    <body>
        <?php require_once('Shared\header.php');?>

        <div class="heading">
            <h1>Seach Page</h1>
        </div>

        <div class="formcontainer">
            <form method="get" action="results.php" class="search">
                <label for="name">Name of book: </label>
                <input type="text" name="name"><br>
                
                <label for="author">Name of author: </label>
                <input type="text" name="author"><br>

                <label for="genre">Genre: </label>
                <input type="text" name="genre"><br>

                <label for="minprice">Max Price: </label>
                <input type="range" name="minprice" min="0.01" max="9999.99" value="0.01" id="minslider" oninput="minSliderChange();">
                <p id="minpriceoutput">$0.01</p><br>

                <label for="maxprice">Max Price: </label>
                <input type="range" name="maxprice" min="0.01" max="9999.99" value="9999.99" id="maxslider" oninput="maxSliderChange();">
                <p id="maxpriceoutput">$9999.99</p><br>

                <label for="isbn">ISBN: </label>
                <input type="text" name="isbn"><br>

                <input type="submit">
                <input type="reset">
            </form>
        </div>

        <?php require_once('Shared\footer.php');?>
    </body>
</html>