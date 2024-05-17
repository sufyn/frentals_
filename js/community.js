// 1. getting user latitude and longitude     

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
}

function successCallback(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  console.log(latitude,longitude);

  getUserCity(latitude, longitude);

}

function errorCallback(error) {
      console.error('Error retrieving geolocation:', error);
    }


// 2. getting location
function getUserCity(latitude, longitude) {
  // Get the user's city from their latitude & longitude coordinates
  const url = `https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
    const city = data.address.city;
      // Use the city information as needed
      console.log(`User's city: ${city}`);
      document.getElementById("locContainer").innerHTML = city
      document.getElementById("hidden").value = city;

      getPosts(city);
      document.getElementById("submit").addEventListener("click", addingPosts(city));
      
    })
  
}


// 3. getting posts by location

function getPosts(city){
// Send the user's location to the server to retrieve location-based posts
const url = `forms/get_posts.php?city=${city}`;
fetch(url)
.then(response => response.json())
.then(posts => {
//  const postsContainer = document.getElementById('posts');
 posts.forEach(post => {
  
  const postsContainer = document.getElementById('posts');

   const postElement = document.createElement('div');
  //  postElement.classList.add('w3-third')

   postElement.innerHTML = `
   
   <div id="postinner" class="w3-padding-16 w3-round-xlarge w3-hover-shadow w3-card w3-mobile"
   style="border-top: 10px;">

     <img style="width: 50%;"  class="w3-image w3-round-xlarge w3-padding" src="  ${post.image} "
     onerror="this.style.display='none'" > </img><br><br>  
     <p class="w3-container">${post.content}</p><br><br>
     <p style="font-size: 10px;" class="w3-right-align"> ${post.date}</p>
     <button style="font-size: 10px;" class="w3-button w3-dark-grey w3-round-xlarge">Connect</button>
     </div>
   `;
   postsContainer.appendChild(postElement);
 });
})
//  .catch(error => {
//   console.error('Failed to fetch location-based posts', error);
//  });
}
  
// 4. adding a post 
  
// When the form is submitted, call the submitForm() function

// This function submits the form data to the server
function addingPosts(city) {

// Get the form data
var image = document.getElementById("image").files[0];
var content = document.getElementById("content").value;
// var con = document.getElementById("hidden").value;

// Create a new FormData object
var formData = new FormData();
// Add the image and content to the FormData object
formData.append("city", city);
formData.append("image", image);
formData.append("content", content);

var xhr = new XMLHttpRequest();
xhr.open("POST", "submit_post.php");
xhr.send(formData);
}
// document.getElementById("submit").addEventListener("click", addingPosts());
