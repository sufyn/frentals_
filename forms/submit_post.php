<!-- 
// Connect to the MySQL database -->

<?php

require('server.php');
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $city = $_POST["city"];
    
    // $city = $_POST["city"];
    if (!isset($city)) {
        echo "city not found";
        $city = "Hyderabad";
      }
    
    
    // Get the content
    $content = $_POST["content"];
    // Get the image file
    $image = $_FILES["image"];
    
if (isset($image)) {
    
    // Check if the image was uploaded successfully
    
//   if ($image["error"] !== UPLOAD_ERR_OK) {
//     echo "Error uploading image: " . $image["error"];
//     exit;
//   }
  
  

    $destination = "C:/xampp/htdocs/frentals/posts/" . $image["name"];
    move_uploaded_file($image["tmp_name"], $destination);
    // if (!move_uploaded_file($image["tmp_name"], $destination)) {
    //   echo "Error moving image to destination";
    //   exit;
    // }
    $img  = $image["name"];
    // Insert the image and content into the database
  }
  
    $sql = "INSERT INTO posts (data, content,location) VALUES ('$img', '$content', '$city')";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
      echo "Image uploaded successfully";
    } else {
      echo "Error uploading image: " . $db->error();
    }
  
    // Redirect the user to the homepage
    header("Location: /frentals/community.html");
    
    }
    $con->close();
    


?>







