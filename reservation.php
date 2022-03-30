


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"  href="./reservation.css">
  <title>Purchase</title>
</head>
<body>
  <h1>Want to make a reservation ?</h1>

  <?php
  require "./utils/dbConnect.php";


  if (isset($_GET['roomId'])){
    $roomId = $_GET['roomId'];

    $connection = DBConnect::getInstance();
    $sql = "SELECT * FROM photo WHERE photoId='$roomId'";
    $result = $connection->query($sql);
    if (mysqli_num_rows($result)>0){
      while($fetch = mysqli_fetch_assoc($result)){
        ?>
        <div class="room"><img src="./upload/<?php echo $fetch['photo'];?>" alt="Hotel image">
        <h4>Price: 40$</h4>
        <a href='./login.php?roomId=<?php echo $roomId;?>'>
        <button >Purchase Now</button>
</a>
      </div>
      <?php
      }
    }
    
  }

?>
</body>
</html>