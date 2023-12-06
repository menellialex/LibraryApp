<?php
session_start();

#include the connection function from conn.php to get 
include "../helpers/conn.php";
$conn = connection();

$query = "DELETE FROM `books` WHERE ISBN = " . $_POST["isbn"] . " and storeid = " . $_SESSION["StoreID"] . ";";

if ($conn->query($query))
{
    header("Location: ../storeprofile.php");
}
else
{
    echo($conn->error);
}
?>