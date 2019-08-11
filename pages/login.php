<?php

$pageTitle = 'Login';

$pageURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {
    $username = trim($_POST['userEmail']);
    $password = trim($_POST['userPassword']);

    $query = "select * from users where username=?";
    $args = [$username];
    $data = $db->run($query, $args);

    var_dump($data);
    if (isset($data[0])) {
        if (password_verify($password, $data[0]['password'])) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST']);
            die();
        } else {
            echo "Password is invalid";
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            body {
                background-color: #772953;
                color: #FFFFFF;
            }
            #login-box {
                max-width:400px;
                /*margin: 0 auto;*/
                border-radius: 5px;
                padding: 10px;
                background-color: #111111;
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
        <div id="login-box">
            <form action="login" method="POST">
                <input type="text" name="userEmail" />
                <input type="password" name="userPassword" /><br />
                <input type="submit" name="loginButton" value="Login" />
            </form>

        </div>
    </body>
</html> 