
<?php
require('server.php');
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $Name = $_POST["Name"];
    $city = $_POST["City"];
    $Product_title = $_POST["Product_title"];
    $Product_description = $_POST["Product_description"];
    $Price = $_POST["Price"];
    $Condition = $_POST["Condition"];
    $More = $_POST["More"];
    
    // Get the image file
    $image = $_FILES["image"];
    
if (isset($image)) {
    
    // Check if the image was uploaded successfully
    
//   if ($image["error"] !== UPLOAD_ERR_OK) {
//     echo "Error uploading image: " . $image["error"];
//     exit;
//   }
  
  

    $destination = "F:/XAMPP/htdocs/frentals/posts/" . $image["name"];
    move_uploaded_file($image["tmp_name"], $destination);
    // if (!move_uploaded_file($image["tmp_name"], $destination)) {
    //   echo "Error moving image to destination";
    //   exit;
    // }
    $img  = $image["name"];
    // Insert the image and content into the database
  }
  
    $sql = "INSERT INTO posts (data, Name,location,title,description,price,condition,more) 
    VALUES ('$img', '$Name', '$city','$Product_title','$Product_description','$Price','$Condition','$More')";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
      echo " uploaded successfully";
    } else {
      echo "Error uploading : " . $db->error();
    }
  
    // Redirect the user to the homepage
    header("Location: /frentals/main.html");
    
    }
    $con->close();
    


?>





