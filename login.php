<?php
    require "./controllers/loginController.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){  // Test if the form has been submitted
        $login = LoginController::loginUser($_POST);
        if ($login){
            if (!$login->isSaved()){
                echo $login->getStateMessage(); // Should be an error message
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>
    <br>
    <br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input type="email" name="email"> Email
        <br>
        <br>
        <input type="password" name="password"> Password
        <br>
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>