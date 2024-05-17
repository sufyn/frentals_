    
// 1. getting latitude and longitude
    
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
}

function successCallback(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  console.log(latitude,longitude);
  // Call the function to fetch and display posts based on the user's location
  const ApiLocation = 'https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}';
  console.log(ApiLocation)
  fetchaddingPosts(latitude, longitude);

}

function errorCallback(error) {
  console.error('Error retrieving geolocation:', error);
}




// // getting posts by location
// function fetchPostsByLocation(latitude, longitude) {
//   // Make an API request to retrieve posts based on the user's location
//   // ...

//   // Once you receive the response, parse the data and display the posts accordingly
//   const posts = response.data; // Assuming the response contains an array of post objects

//   const postContainer = document.getElementById('postContainer');

//   // Clear any existing posts in the container
//   postContainer.innerHTML = '';

//   // Loop through the posts and create HTML elements to display them
//   posts.forEach(post => {
//     const postElement = document.createElement('div');
//     postElement.classList.add('w3-card', 'w3-padding', 'w3-margin');
//     postElement.innerHTML = `
//       <img>${post.img}</img>
//       <p>${post.content}</p>
//       <p>Author: ${post.author}</p>
//       <p>Location: ${post.location}</p>
//     `;
//     postContainer.appendChild(postElement);
//   });
// }



    // 2. adding posts using input
function fetchaddingPosts(latitude,longitude){
    // Example using Google Maps Geocoding API
// const API_KEY = 'your-api-key';  
const ApiLocation = 'https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}';
// const Location = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${API_KEY}`;
console.log(ApiLocation)
// Make an HTTP request to the geocoding API endpoint and retrieve the locality information
// You can use techniques like Fetch API, Axios, or other AJAX libraries to perform the request
// Process the response and extract the locality information to display or store it as needed
const location = response.data(ApiLocation);

const loc_container = document.getElementById('locContainer');

// Clear any existing posts in the container
loc_Container.innerHTML = '';
// showing location
// Loop through the posts and create HTML elements to display them
locations.forEach(location => {
  const locElement = document.createElement('div');
  locElement.classList.add('w3-card', 'w3-padding', 'w3-margin','w3-display-right');
  locElement.innerHTML = `
    <p>City:${location.address.city}</p>
    <p>Author: ${location.author}</p>
  `;
  loc_Container.appendChild(locElement);
});

    
const loc_city = location.address.city
// 3. adding a post 
const postForm = document.getElementById('postForm');
postForm.addEventListener('submit', function(event) {
  event.preventDefault();

  // Retrieve the post content from the form input fields
  const postImage = document.getElementById('postImage').value;
  const postContent = document.getElementById('postContent').value;

  // Create a new post object with the required information
  const newPost = {
    Image: postImage,
    content: postContent,
     // Replace with actual user identification
    location: loc_city // Replace with the user's locality information
  };

  // Send the new post object to your server or API for storage
  // You can use techniques like AJAX requests (Fetch API, Axios, etc.) to send the data
});




//4. hetting posts by location
 // Send the user's location to the server to retrieve location-based posts
 fetch(`/posts?city=${loc_city}`)
        .then(response => response.json())
        .then(posts => {
          const postsContainer = document.getElementById('posts');
          posts.forEach(post => {
            const postElement = document.createElement('div');
            postElement.innerHTML = `
              <p>${post.content}</p>
              <p>Author: ${post.author}</p>
              <p>Location: ${post.location}</p>
            `;
            postsContainer.appendChild(postElement);
          });
        })
        .catch(error => {
          console.error('Failed to fetch location-based posts', error);
        });
    

}
    
    
    
    

