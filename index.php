<?php
/**
 * Entry point of web page
 */

 include './database.php';

$pageTitle = 'Login';

if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {
    $username = trim($_POST['userEmail']);
    $password = trim($_POST['userPassword']);

    $db = new Database();
    $query = "select * from users where username=?";
    $args = [$username];
    $data = $db->run($query, $args);

    var_dump($data);
    if (isset($data[0])) {
        if (password_verify($password, $data[0]['password'])) {
            echo "Password is valid";
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
                margin: 0 auto;
                border: 1px solid #2C001E;
                border-radius: 5px;
                padding: 10px;
                background-color: #2C001E;
            }
            input {
                margin: 10px;
            }
        </style>
        <title><?php echo $pageTitle ?></title>
    </head>
    <body>
            <div id="login-box">
                <h1><?php echo $pageTitle ?></h1>

                <form action="index.php" method="POST">
                    <input type="text" name="userEmail" />
                    <input type="password" name="userPassword" /><br />
                    <input type="submit" name="loginButton" value="Login" />
                </form>

            </div>
    </body>
</html> 