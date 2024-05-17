<?php
// Connect to the MySQL database
require('server.php');
// Retrieve the city parameter from the query string
$city = $_GET['city'];

// Prepare and execute the SQL query to retrieve posts based on the city
// $stmt = $con->prepare('SELECT * FROM posts WHERE location = ?');
// #get all posts in sql in descending order
$stmt = $con->prepare('SELECT * FROM posts WHERE location = ? ORDER BY create_datetime DESC');
$stmt->bind_param('s', $city);
$stmt->execute();
$result = $stmt->get_result();
if ($result){
$images = [];
foreach ($result as $results) {
  $images[] = [
    'city' => $results['location'],
    'image' => 'posts/' . $results['data'],
    'content' => $results['content'],
    'date' => $results['create_datetime']
  ];
}
}

else{
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}
// Close the database connection
$stmt->close();
$con->close();

// Return the posts as JSON
header('Content-Type: application/json');
echo json_encode($images);
?>
