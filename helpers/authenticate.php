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
if ($stmt = $conn->prepare('SELECT * FROM customer WHERE EmailAddr = ?'))
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
        $stmt->bind_result($Email, $FirstName, $LastName, $Addr, $Country, $Username);
        $stmt->fetch();

        #create a session
        session_start();
        session_create_id();

        #we are logged in
        $_SESSION['loggedin'] = TRUE;

        #log variables during session
        $_SESSION['EmailAddr'] = $_POST['email'];
        $_SESSION['FirstName'] = $FirstName;
        $_SESSION['LastName'] = $LastName;
        $_SESSION['Addr'] = $Addr;
        $_SESSION['Country'] = $Country;
        $_SESSION['Username'] = $Username;

        echo("<h1>Welcome " . $FirstName . " " . $LastName . "</h1>");
        echo("<h2>Redirecting to front page</h2>");
        //redirect to index
        header('Location: ../index.php');
    }
    else
    {
        echo("<h1>Email has not been registered withen the system.</h1>");
    }
    
    #close
    $stmt->close();
}
else
{
    echo($conn -> error);
}
?>