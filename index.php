<!-- This is the root page
     go to localhost/LibraryApp/ and this will show
-->

<?php 
    #test connection to the DB
    #should throw error on index.php
    #if doesnt work
    include "helpers/conn.php"; 
    $conn = connection();

    session_start();

    require('Shared\header.php');

    if ($_SESSION['loggedin'] == FALSE)
    {
        header("Location: /libraryapp/login.php");
    }
    else
    {
        echo("<h1>Welcome " . $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . "!</h1>");
    }
?>

<html>
    <head>
        <link href='CSS\index.css' rel="stylesheet">
    </head>

    <body>
        <div class="tablecontainer">
            <table class="recommend">
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                </tr>
                <tr>
                    <?php
                        #prepare SQL statement such that it prevents SQL injection
                        if ($stmt = $conn->prepare('SELECT Name, Author, Genre FROM `books` WHERE 1 order by rand() limit 1;'))
                        {
                            #execute the query and store the result
                            $stmt->execute();
                            $stmt->store_result();

                            #check to see if anything returned, if so, create a session
                            #if not, incorrect email account
                            if ($stmt->num_rows() > 0)
                            {
                                #bind and fetch variables
                                $stmt->bind_result($name, $author, $genre);
                                $stmt->fetch();

                                echo("<td>" . $name .  "</td>");
                                echo("<td>" . $author .  "</td>");
                                echo("<td>" . $genre .  "</td>");
                            }
                        }
                        else
                        {
                            echo($conn -> error);
                        }
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>

<?php 
    require('Shared\footer.php');
?>