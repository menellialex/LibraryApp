<?php
session_start();

#include the connection function from conn.php to get 
include "../helpers/conn.php";
$conn = connection();

$query = "INSERT INTO `customer`(`EmailAddr`, `FirstName`, `LastName`, `Addr`, `Country`, `Username`) 
          VALUES ('" . $_POST["email"] . "','" . $_POST["firstname"] . "','" . $_POST["lastname"] . "','" 
          . $_POST["addr"] . "','" . $_POST["country"] . "','" . $_POST["username"] . "')";

if ($conn->query($query))
{
    header("Location: ../login.php");
}
else
{
    echo($conn->error);
}
?>