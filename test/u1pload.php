<?php
// Get the images from the database
$db = new mysqli('localhost', 'root', '', 'rentopedia');
$sql = "SELECT content, data, location FROM posts";
$results = $db->query($sql);

// Loop through the results and create a JSON array
$images = [];
foreach ($results as $result) {
  $images[] = [
    'location' => $result['location'],
    'data' => 'uploads/' . $result['data'],
    'content' => $result['content']
  ];
}

// Close the database connection
$db->close();

// Return the JSON array
echo json_encode($images);

// Upload image
if (isset($_POST['submit'])) {

  // Get the file name
  $filename = $_FILES['file']['name'];

  // Get the text
  $content = $_POST['content'];
  $city = $_POST['location'];

  // Move the file to the uploads directory
  $target_dir = './uploads/';
  move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $filename);

  // Insert the file name and text into the database
  $db = new mysqli('localhost', 'root', '', 'rentopedia');
  $sql = "INSERT INTO posts (data, content,location) VALUES ('$filename', '$content','$city')";
  $db->query($sql);

  // Close the database connection
  $db->close();

  // Redirect the user to the index page
  header('Location: index.php');
}

?>