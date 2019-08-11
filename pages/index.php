<?php

$pageTitle = 'Home';

$pageURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            body {
                background-color: #E95420;
                color: #FFFFFF;
            }
            input {
                margin: 10px;
            }
        </style>
        <title><?php echo $pageTitle ?></title>
    </head>
    <body>
        <h1><?php echo $pageTitle ?></h1>
        <p><?php echo $pageURL; ?></p>
        <p><a href="/login">Login</a></p>
    </body>
</html> 