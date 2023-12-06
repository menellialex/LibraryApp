<?php
session_start();

#include the connection function from conn.php to get 
include "../helpers/conn.php";
$conn = connection();

$query = "INSERT INTO `books`(`Name`, `Author`, `Genre`, `Year`, `ISBN`, `StoreID`, `Price`) 
            VALUES ('" . $_POST["name"] . "','" . $_POST["author"] . "','" . $_POST["genre"] . "'," 
            . $_POST["year"] . "," . $_POST["isbn"] . "," . $_SESSION["StoreID"] . "," . $_POST["price"] . ")";

if ($conn->query($query))
{
    header("Location: ../storeprofile.php");
}
else
{
    echo($conn->error);
}
?>