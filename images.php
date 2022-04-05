
<?php
  require "/var/www/html/hotel/utils/dbConnect.php";

  $connection = DBConnect::getInstance();

  if ($connection == null){
    echo "Failed to connect to the database";
    exit();
  }
    if(isset($_POST['submit'])){
      $imageCount = count($_FILES['image']['name']);
     for($i=0;$i<$imageCount;$i++){
       $imageName = $_FILES['image']['name'][$i];
       $imageTempName = $_FILES['image']['tmp_name'][$i];
       $targetPath = "./upload/".$imageName;
       if (move_uploaded_file($imageTempName, $targetPath)){
        $sql = "INSERT INTO photo(photo) VALUES('$imageName')";
        $result = $connection->query($sql);
        if ($result){
          echo "File uploaded successfully !";
          
        }else {
          echo "SQl ERROR: ".$connection->error;
        }
      }else {
        echo "Not uploaded because of error #".$_FILES["file"]["error"];
      }

     }

  }
  

  


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Images</title>
  </head>
  <body>
    <h2>Handle Images</h2>
    <div>
      <form action="./images.php" method="POST" enctype="multipart/form-data">
      Select image <br>
      <br>
      <input type="file" name="image[]" multiple><br><br>
      <input type="submit" name="submit" value="Upload" >
        
      </form>
    </div>
  </body>
</html>
