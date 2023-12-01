<?php
    #reference this: https://stackoverflow.com/questions/3512507/proper-way-to-logout-from-a-session-in-php
    #start session
    session_start();

    #delete session variables
    $_SESSION = array();

    #delete any cookies if stored
    if (ini_get("session.use_cookies"))
    {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time()-42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    #destory session
    session_destroy();

    header('Location: ../index.php');
?>