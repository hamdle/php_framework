<?php

// Define page functions
function getCheckAuthUser()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        return true;
    }
    return false;
}

// Process page
session_start();

$pageLinks = '<a href="/login">Login</a>';
if (getCheckAuthUser()) {
    $pageLinks = '<a href="/admin">Admin</a>';
}

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <style type="text/css">
            .orange-background {
                background-color: #E95420;
            }
        </style>
        <title><?php echo $pageTitle ?></title>
    </head>
    <body class="orange-background">
        <h1><?php echo $pageTitle ?></h1>
        <p><?php echo $pageURL; ?></p>
        <p><?php echo $pageLinks; ?></p>
    </body>
</html> 