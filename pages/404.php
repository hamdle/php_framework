<?php

$pageTitle = '404';

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <style type="text/css">
            .gray-background {
                background-color: #333333;
            }
        </style>
        <title><?php echo $pageTitle ?></title>
    </head>
    <body class="gray-background">
        <h1><?php echo $pageTitle ?></h1>
        <p>Page not found</p>
        <p><?php echo $pageURL; ?></p>
    </body>
</html> 