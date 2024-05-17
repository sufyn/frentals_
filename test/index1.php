<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload-image.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Upload">
      </form>
      <?php

      $db = new mysqli("localhost", "root", "", "rentopedia");
      
      $sql = "SELECT data FROM posts";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      
      // while ($row = $stmt->fetch()) {
      //   $image_name = $row["data"];
      
      //   echo "<img src='uploads/$image_name'>";
      // }
      
      ?>
            
</body>
</html>