<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $image = $_FILES["image"];

  if ($image["error"] !== UPLOAD_ERR_OK) {
    echo "Error uploading image: " . $image["error"];
    exit;
  }

  $destination = "uploads/" . $image["name"];

  if (!move_uploaded_file($image["tmp_name"], $destination)) {
    echo "Error moving image to destination";
    exit;
  }

  $db = new mysqli("localhost", "root", "", "rentopedia");

  $sql = "INSERT INTO posts (data) VALUES ('$destination')";
  $result = $db->query($sql);

  if ($result) {
    echo "Image uploaded successfully";
  } else {
    echo "Error uploading image: " . $db->error();
  }

  $db->close();
}

?>
