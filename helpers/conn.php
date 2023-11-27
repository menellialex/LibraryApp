<?php
    function connection()
    {
        $conn = mysqli_connect("localhost", "root", "", "librarysystem");
        if (mysqli_connect_errno())
        {
            exit("Failed to connect to MySQL: " . mysqli_connect_error());
        }
        return $conn;
    }
?>