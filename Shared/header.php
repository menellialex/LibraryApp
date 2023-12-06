
<body>
    <div class = "topnav">
        <a class="active" href="/LibraryApp/index.php">Home</a>
        <a href="/LibraryApp/search.php">Search</a>
        
        <?php
            if (isset($_SESSION["loggedin"]) == FALSE)
            {
                echo("<a href='/LibraryApp/login.php'>Login</a>");
            }
            else
            {
                echo("<a href='/LibraryApp/helpers/logout.php'>Logout</a>");
                if ($_SESSION["user"] == true)
                {
                    echo("<a href='/LibraryApp/userprofile.php'>Profile</a>");
                }
                else
                {
                    echo("<a href='/LibraryApp/storeprofile.php'>Profile</a>");
                }
            }
        ?>
    </div>
    <br><br>
</body>
