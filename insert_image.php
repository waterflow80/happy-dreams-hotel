<?php
error_reporting(0);
?>
<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "photos/".$filename;
          
    $db = mysqli_connect("localhost", "root", "ubuntudb", "happy_dreams_hotel");
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO photo (photo) VALUES ('$filename')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
            echo $msg;
        }else{
            $msg = "Failed to upload image";
            echo $msg;
      }
  }
  $result = mysqli_query($db, "SELECT * FROM photo");
while($data = mysqli_fetch_array($result))
{
  
      ?>
<img width="500px" height="500px" src="<?php echo $data['Filename']; ?>">
  
<?php
}
?>
  
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type= "text/css" href ="style.css"/>
<div id="content">
  
  <form method="POST" action="" enctype="multipart/form-data">
      <input type="file" name="uploadfile" value=""/>
        
      <div>
          <button type="submit" name="upload">UPLOAD</button>
        </div>
  </form>
</div>
</body>
</html>