<?php
  require ("/var/www/html/hotel/utils/dbConnect.php");

  $connection = DBConnect::getInstance();

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "INSERT INTO Account(email, password, userName, role) VALUES('".$_POST['email']."', '".$_POST['password']."','".$_POST['userName']."', 'admin')";
    $result = $connection->query($sql);
    if (!$result){
      echo "Failed to save admin";
    }
    else {
      echo "Admin saved successdully !";
    }

  }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Admin</title>
</head>
<body>
  <h1>Add A new Administrator</h1>
  <br>
  <br>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="email" name="email" id=""> Email
    <br>
    <br>
    <input type="password" name="password" id=""> Password
    <br>
    <br>
    <input type="text" name="userName"> User Name
    <br>
    <br>
    <input type="submit" name="submit" value="Create">
    <br>
    <br>
  </form>
</body>
</html>