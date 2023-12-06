<?php

#start session
session_start();

#include the connection function from conn.php to get 
include "conn.php";
$conn = connection();

if (str_contains($_POST["action"], "purchase"))
{   
    #get rownumber from action value
    $rownum = (int)filter_var($_POST["action"], FILTER_SANITIZE_NUMBER_INT);
    #get other variables from the post request
    $storeid = $_POST["data" . $rownum . "6"];
    $isbn = $_POST["data" . $rownum . "5"];
    $price= $_POST["data" . $rownum . "7"];
    $query = "INSERT INTO sells (EmailAddr, StoreID, ISBN, Price) VALUES ('" . $_SESSION["EmailAddr"] . "'," . $storeid . "," . $isbn . "," . $price . ");";
    
    if ($conn->query($query))
    {
        header('Location: ../search.php');
    }
    else
    {
        exit($conn->error);
    }
}
elseif (str_contains($_POST["action"], "rent"))
{
    #get rownumber from action value
    $rownum = (int)filter_var($_POST["action"], FILTER_SANITIZE_NUMBER_INT);
    #get other variables from the post request
    $storeid = $_POST["data" . $rownum . "6"];
    $isbn = $_POST["data" . $rownum . "5"];

    #look a month into the future for renting period.
    $date = date_create();
    date_add($date, date_interval_create_from_date_string("30 days"));

    $query = "INSERT INTO rents (EmailAddr, StoreID, ISBN, RentTill) VALUES ('" . $_SESSION["EmailAddr"] . "'," . $storeid . "," . $isbn . ",'" . date_format($date, "Y-m-d") . "');";
    
    if ($conn->query($query))
    {
        header('Location: ../search.php');
    }
    else
    {
        exit($conn->error);
    }
}
elseif (str_contains($_POST["action"], "wishlist"))
{
        #get rownumber from action value
        $rownum = (int)filter_var($_POST["action"], FILTER_SANITIZE_NUMBER_INT);
        #get other variables from the post request
        $isbn = $_POST["data" . $rownum . "5"];
        $query = "INSERT INTO wishlist (EmailAddr, ISBN) VALUES ('" . $_SESSION["EmailAddr"] . "'," . $isbn . ");";
        
        if ($conn->query($query))
        {
            header('Location: ../search.php');
        }
        else
        {
            exit($conn->error);
        }
}
else
{
    #something went wrong
    exit("Something went wrong");
}



?>