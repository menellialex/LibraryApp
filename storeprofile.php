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

        
        <div class="heading">
            <?php
                echo("<h1>Welcome to the store profile page " . $_SESSION["Name"] .  "</h1>")
            ?>
        </div>

        <div class="righttable">
            <h2>Sold books</h2>

            <table>
                <tr>
                    <th>Book</th>
                    <th>Customer</th>
                    <th>Price</th>
                </tr>

                <?php
                    #return all wishlisted book titles
                    if ($result = $conn->query("select b.name, s.emailaddr, s.price from sells s, books b where b.ISBN = s.ISBN and s.StoreID = b.StoreID and s.StoreID = '" . $_SESSION["StoreID"] . "';"))
                    {
                        #check if we returned any number of rows
                        if ($result->num_rows > 0)
                        {
                            #if there are rows greater than 0, iterate through them.
                            while($row = $result->fetch_row())
                            {
                                echo("<tr>");
                                foreach ($row as $data)
                                {
                                    echo("<td>" . $data . "</td>");
                                }
                                echo("</tr>");
                            }
                        }
                    }
                    else
                    {
                        echo($conn->error);
                    }
                ?>
            </table>

        </div>

        <div class="lefttable">
            <h2>Current Rents</h2>

            <table class="renttable">
                <tr>
                    <th>Book</th>
                    <th>Customer</th>
                    <th>Return Date</th>
                </tr>
                
                <?php
                    #return all wishlisted book titles
                    if ($result = $conn->query("SELECT b.name, c.emailaddr, r.renttill FROM rents r, books b, customer c WHERE b.ISBN = r.ISBN and r.EmailAddr = c.EmailAddr and r.StoreID = b.StoreID and r.StoreID = '" . $_SESSION["StoreID"] . "';"))
                    {
                        #check if we returned any number of rows
                        if ($result->num_rows > 0)
                        {
                            #if there are rows greater than 0, iterate through them.
                            while($row = $result->fetch_row())
                            {
                                echo("<tr>");
                                foreach ($row as $data)
                                {
                                    echo("<td>" . $data . "</td>");
                                }
                                echo("</tr>");
                            }
                        }
                    }
                    else
                    {
                        echo($conn->error);
                    }
                ?>
            </table>
        </div>

        <div>
            <button onclick = "window.location.href='storeprofile/addbook.php'">Add new book to store</button>
            <button onclick = "window.location.href='storeprofile/deletebook.php'">Delete a book from the store</button>
        </div>

        <?php require('Shared\footer.php'); ?>
    </body>
</html>
