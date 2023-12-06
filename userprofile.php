<?php
    session_start();

    #include the connection function from conn.php to get 
    include "helpers/conn.php";
    $conn = connection();
?>

<!DOCTYPE html>

<html>
    <head>
        <link href='CSS\footer.css' rel="stylesheet">
        <link href='CSS\header.css' rel="stylesheet">
        <link href='CSS\profile.css' rel="stylesheet">
    </head>

    <body>
        <?php require_once('Shared\header.php');?>

        <div class="heading">
            <?php
                echo("<h1>Welcome " . $_SESSION["FirstName"] . " " . $_SESSION["LastName"] .  "</h1>")
            ?>
        </div>

        <div class="righttable">
            <h2>Wishlist</h2>

            <form action="helpers/wishlisthelper.php" method="post">
                <ul>
                    <?php
                        #return all wishlisted book titles
                        if ($result = $conn->query("Select  DISTINCT(name) from books b, wishlist w where b.ISBN = w.ISBN and w.EmailAddr = '" . $_SESSION["EmailAddr"] . "';"))
                        {
                            #check if we returned any number of rows
                            if ($result->num_rows > 0)
                            {
                                #create rownum and datanum var
                                $rownum = 1;
                                $datanum = 1;
                                #if there are rows greater than 0, iterate through them.
                                while($row = $result->fetch_row())
                                {
                                    foreach ($row as $data)
                                    {
                                        echo("<li>" . $data . "</li>");
                                        echo("<input type='hidden' name='data" . $rownum . $datanum . "' value= '" . $data ."'/>");
                                        #iterate data num
                                        $datanum += 1;
                                    }
                                    #best explained in rentpurchase.php
                                    echo("<td><button type='submit' name='action' value='remove" . $rownum . "'>Remove</button></td>");
                                    echo("<input type='hidden' name='rownum' value='" . $rownum . "'/>");
                                    echo("</tr>");

                                    #reset datanum
                                    $datanum = 1;
                                    #iterate rownum
                                    $rownum += 1;   
                                }
                            }
                        }
                        else
                        {
                            echo($conn->error);
                        }
                    ?>
                </ul>
            </form>

        </div>

        <div class="lefttable">
        <h2>Current Rents</h2>
            <table class="renttable">
                <tr>
                    <th>Book</th>
                    <th>Return Date</th>
                    <th>Store</th>
                </tr>
                
                <?php
                    #return all wishlisted book titles
                    if ($result = $conn->query("Select DISTINCT(b.name), r.RentTill, bk.Name from rents r, books b, bookkeeper bk where b.ISBN = r.ISBN and bk.StoreID = r.StoreID and r.emailaddr = '" . $_SESSION["EmailAddr"] . "';"))
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

        <?php require_once('Shared\footer.php');?>
    </body>
</html>