<?php
#include the connection function from conn.php to get 
include "conn.php";
$conn = connection();

#check to see if email field has something in it
if ( !isset($_POST['email']) )
{
    exit("Please fill out the email box");
}

#prepare SQL statement such that it prevents SQL injection
if ($stmt = $conn->prepare('SELECT * FROM customer WHERE email = ?'))
{
    #bind email to the question mark
    $stmt->bind_param('s', $_POST['email']);
    #execute the query and store the result
    $stmt->execute();
    $stmt->store_result();
    
    #check to see if anything returned, if so, create a session
    #if not, incorrect email account
    if ($stmt->num_rows() > 0)
    {
        #bind the rest of the results to variables
        $stmt->bind_result($firstname, $lastname, $addr, $country, $username);

        #create a session
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;

        #log variables during session
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['addr'] = $addr;
        $_SESSION['country'] = $country;
        $_SESSION['username'] = $username;

        echo "<h1>Welcome " . $firstname . " " . $lastname . "</h1>";
    }
    else
    {
        "<h1>Email has not been registered withen the system.</h1>";
    }
    
    #close
    $stmt->close();
}



?>