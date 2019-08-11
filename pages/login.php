<?php

// Set page vars
$pageTitle = 'Login';
$pageURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Define page functions
function processLogin($db)
{
    if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {
        $username = trim($_POST['userEmail']);
        $password = trim($_POST['userPassword']);
    
        $query = "select * from users where username=?";
        $args = [$username];
        $data = $db->run($query, $args);
    
        var_dump($data);
        if (isset($data[0])) {
            if (password_verify($password, $data[0]['password'])) {
                // Login successful
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/admin');
                die();
            } else {
                echo "Password is invalid";
            }
        }
    }
}

function checkAuthUser()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/admin');
        die();
    }
}

// Process page
session_start();

// If already logged in, go to admin page
checkAuthUser();
processLogin($db);

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
            #login-box {
                max-width:400px;
                /*margin: 0 auto;*/
                border-radius: 5px;
                padding: 10px;
                background-color: #111111;
            }
        </style>
        <title><?php echo $pageTitle ?></title>
    </head>
    <body class="purple-background">
        <h1><?php echo $pageTitle ?></h1>
        <p><?php echo $pageURL; ?></p>
        <div id="login-box">
            <form action="login" method="POST">
                <input type="text" name="userEmail" />
                <input type="password" name="userPassword" /><br />
                <input type="submit" name="loginButton" value="Login" />
            </form>

        </div>
    </body>
</html> 