<?php
    require "./controllers/registrationControllers.php";

    $controller = new RegistrationController();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){  // Test if the form has been submitted
        $save = $controller->addUser($_POST);
        if (!$save->isSaved()){
            die ($save->getStateMessage());
        }else {
            echo ($save->getStateMessage());
            header("Location:./login.php");
            exit();
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration Page</h1>
    <br>
    <br>
    <h2>Join Us Now</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input type="text" name="firstName"> First Name
        <br>
        <br>
        <input type="text" name="lastName"> Last Name
        <br>
        <br>
        <input type="text" name="NIdNumber"> National Id NIdNumber
        <br>
        <br>
        <input type="tel" name="phone"> Phone number
        <br>
        <br>
        <input type="email" name="email"> E-mail
        <br>
        <br>
        <input type="radio" name="gender" required>Male
        <input type="radio" name="gender">Female
        <br>
        <br>
        <input type="password" name="password" required> Password
        <br><br>
        <input type="password" name="confirmPassword" required> Confirm password
        <br>
        <br>
        <input type="text" name="username" id=""> Username
        <br>
        <br>
        <input type="submit" name="join" id="" value="Join">
        <input type="reset" name="rest" value="clear">
    </form>
</body>
</html>