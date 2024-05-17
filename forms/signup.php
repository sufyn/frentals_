
<?php
    require('server.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['submit'])) {
        // removes backslashes
        $username = stripslashes($_GET['name']);
        //escapes special characters in a string
        $socials = stripslashes($_GET['socials']);
        //escapes special characters in a string
        
        $email    = stripslashes($_GET['email']);
        $password = stripslashes($_GET['password']);
        $create_datetime = date("Y-m-d H:i:s");

        $query    = "INSERT into `frentals_users` (name,socials, password, email, create_datetime )
                     VALUES ('$username',' $socials', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='/frentals/index.html'>Login</a></p>
                  </div>";
            header("Location: /frentals/index.html");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='/frentals/index.html'>registration</a> again.</p>
                  </div>";
            header("Location: /frentals/index.html");
        }
        
    } 

    else{
        echo "not successful";
    }
?>



