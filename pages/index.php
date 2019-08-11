<?php

$pageTitle = 'Home';

$pageURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

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
        <p><a href="/login">Login</a></p>
    </body>
</html> 