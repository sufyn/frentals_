<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
</head>
<body>

<h1>Image Upload</h1>

<form action="upload.php" method="post" enctype="multipart/form-data">

<input type="file" name="file">

<input type="text" name="content">

<input type="submit" name="submit" value="Upload">

</form>

<div id="images"></div>
<div id="cnt"></div>

<script>

// Get the images from the database
async function getImages() {
  const response = await fetch('u1pload.php');
  const images = await response.json();

  // Loop through the results and display the images
  images.forEach(image => {
    const img = document.createElement('img');
    img.src = image.data;
    img.width = 300;
    const ctent = document.getElementById('cnt');
    ctent.innerHTML = image.content;
    document.getElementById('images').appendChild(img);
  });
}

getImages();

// Upload image
async function uploadImage() {
  const formData = new FormData();
  formData.append('file', document.getElementById('file').files[0]);
  formData.append('content', document.getElementById('content').value);
  formData.append('location', document.getElementById('locContainer').value );  
  const response = await fetch('upload.php', {
    method: 'POST',
    body: formData
  });

  if (response.status === 200) {
    alert('Image uploaded successfully!');
  } else {
    alert('Error uploading image!');
  }
}

document.getElementById('submit').addEventListener('click', uploadImage);

</script>

</body>
</html>
