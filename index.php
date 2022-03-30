<?php
  require "./utils/dbConnect.php";
  $connection = DBConnect::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"  href="./index.css">
    <title>Registration</title>
  </head>
  <body>
  <nav>
<a href='./login.php'>
<button >Login</button>
</a>
<a href='./registration.php'>
<button>Register</button>
</a>
<a href='./about.php'>
<button>About</button>
</a>
<a href='./contact.php'>
<button>Contact</button>
</a>

</nav>
  <h1>Welcome to happy dreams hotel</h1>
   <br>
   <br>
   
   <div class="rooms">
   <?php
    $sql = "SELECT * FROM photo";
    $result = $connection->query($sql);
    if(mysqli_num_rows($result) > 0){
      while($fetch = mysqli_fetch_assoc($result)){
        ?>
        <a href="./reservation.php?roomId=<?php echo $fetch['photoId'];?>"><div id="<?php echo $fetch['photoId'];?>" class="room"><img src="./upload/<?php echo $fetch['photo'];?>" alt="Hotel image">
        <h4>Price: 40$</h4>
      </div>
        
      </a>
        <br>
        <br>
        <?php
      }
    }
   ?>
   </div>
   
  </body>
</html>
