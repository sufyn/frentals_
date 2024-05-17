document.getElementById("submit").addEventListener("click", addingPosts());

function addingPosts() {
 
    // Get the form data
    var image = document.getElementById("image").files[0];
    var Name = document.getElementById("Name").value;
    var City = document.getElementById("City").value;
    var Product_title = document.getElementById("Product_title").value;
    var Product_description = document.getElementById("Product_description").value;
    var Price = document.getElementById("Price").value;
    var Condition = document.getElementById("Condition").value;
    var More = document.getElementById("More").value;
    
    // Create a new FormData object
    var formData = new FormData();
    // Add the image and content to the FormData object
    formData.append("image", image);
    formData.append("Name", Name);
    formData.append("City", City);
    formData.append("Product_title", Product_title);
    formData.append("Product_description", Product_description);
    formData.append("Price", Price);
    formData.append("Condition", Condition);
    formData.append("More", More);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "owner_form.php");
    xhr.send(formData);
    }
    