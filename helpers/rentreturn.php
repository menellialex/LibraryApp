<?php

#start session
session_start();

#include the connection function from conn.php to get 
include "conn.php";
$conn = connection();

#get rownumber from action value
$rownum = (int)filter_var($_POST["action"], FILTER_SANITIZE_NUMBER_INT);

if ($result = $conn->query("SELECT isbn FROM books where name = '" . $_POST["data" . $rownum . 1] . "' limit 1;"))
{
    $row = $result->fetch_row();

    $query = "DELETE FROM `rents` WHERE isbn = '" . $row[0] . "' and StoreID = " . $_SESSION["StoreID"] . " and EmailAddr = '" . $_POST["data" . $rownum . 2] .  "';";

    if ($conn->query($query))
    {
        header('Location: ../storeprofile.php');
    }
    else
    {
        echo($conn->error);
    }
}
else
{
    echo($conn->error);
}

?>