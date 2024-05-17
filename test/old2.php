<?php

// Create a new mysqli object
$mysqli = new mysqli("localhost", "root", "", "rentopedia");

// Check if the connection was successful
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Get all posts from the database
$sql = "SELECT * FROM posts";
$result = $mysqli->query($sql);

// Check if the query was successful
if ($result) {
  while ($row = $result->fetch_assoc()) {
    // Print the post title
    echo $row["data"] . "<br>";

    // Print the post content
    echo $row["content"] . "<br>";

    // Print the post date
    echo $row["create_datetime"] . "<br>";
  }
} else {
  echo "No posts found";
}

// Close the connection to the database
$mysqli->close();

?>
