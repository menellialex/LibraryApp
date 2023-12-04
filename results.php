<?php
    #start session
    session_start();

    #include the connection function from conn.php to get 
    include "helpers/conn.php";
    $conn = connection();
?> 

<!DOCTYPE HTML>

<html>
    <head>
        <link href='CSS\results.css' rel="stylesheet">
    </head>

    <body>
        <?php require_once('Shared\header.php');?><br><br>

        <div class="returnContainer">
            <table class="returntable">
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>ISBN</th>
                    <th>Store ID</th>
                    <th>Price</th>
                </tr>

                <?php
                    #start to build the sql statement
                    $statement = 'SELECT * FROM books WHERE ';
                    $andneeded = false;
            
                    #im sure theres a better way, but functionality comes first
                    if ($_GET['name'] != "")
                    {
                        $statement = $statement . 'name LIKE "%'. $_GET['name'] . '%" ';
                        $andneeded = true;
                    }
                    if ($_GET['author'] != "")
                    {
                        if ($andneeded)
                        {
                            $statement = $statement . "AND author LIKE '%" . $_GET['author'] . "%' ";
                        }
                        else
                        {
                            $statement = $statement . 'author LIKE "%' . $_GET['author'] . '%" ';
                            $andneeded = true;
                        }
                    }
                    if ($_GET['genre'] != "")
                    {
                        if ($andneeded)
                        {
                            $statement = $statement . 'AND genre LIKE "%'. $_GET['genre'] . '%" ';
                        }
                        else
                        {
                            $statement = $statement . 'genre LIKE "%'. $_GET['genre'] . '%" ';
                            $andneeded = true;
                        }
                    }
                    if ($_GET['isbn'] != "")
                    {
                        if ($andneeded)
                        {
                            $statement = $statement . 'AND isbn LIKE "%'. $_GET['isbn'] . '%" ';
                        }
                        else
                        {
                            $statement = $statement . 'isbn LIKE "%'. $_GET['isbn'] . '%" ';
                            $andneeded = true;
                        }
                    }
            
                    #we will always have a price range
                    if ($andneeded)
                    {
                        $statement = $statement . "AND price BETWEEN '" . $_GET['minprice'] . "' AND '" . $_GET['maxprice'] . "';";
                    }
                    else
                    {
                        $statement = $statement . "price BETWEEN '" . $_GET['minprice'] . "' AND '" . $_GET['maxprice'] . "';";
                    }
            
                    #echo($statement . "<br>");
                    #query the table
                    #no SQL injection protection lmao
                    if ($result = $conn->query($statement))
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