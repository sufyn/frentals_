<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   echo $_GET["city"];


// // Get the user location
// $city = $_GET['city'];

// Get the image from the POST request
$image = $_FILES['image'];

// Move the image to the uploads directory
$target_dir = './uploads/';
move_uploaded_file($image['tmp_name'], $target_dir . $image['image']);
$img = $image['image'];
$cnt = $_POST['content'];
// Insert the image and text into the database
$db = new mysqli('localhost', 'root', '', 'rentopedia');
$sql = "INSERT INTO posts (location, data, content) VALUES ('$city', '$img', '$cnt')";
$db->query($sql);

// Close the database connection
$db->close();

// Redirect the user to the index page
header('Location: index.php');
} else {
    echo "No city was provided";
  }
  
?>