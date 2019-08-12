<?php

// Define page functions
function logout()
{
    $_SESSION['loggedin'] = false;
    $_SESSION['username'] = null;
    session_destroy();
}

// Process page
session_start();

logout();

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <style type="text/css">
            .purple-background {
                background-color: #772953;
            }
        </style>
        <title><?php echo $pageTitle ?></title>
    </head>
    <body class="purple-background">
        <h1><?php echo $pageTitle ?></h1>
        <p><?php echo $pageURL; ?></p>
        <p>You have been logged out</p>
        <p><a href="/">Home</a></p>
    </body>
</html> 