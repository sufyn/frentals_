<?php
    require('server.php');
    
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['submit'])) {
        // removes backslashes
        $username = stripslashes($_GET['name']);
        //escapes special characters in a string
        
        $email    = stripslashes($_GET['email']);
        $message = stripslashes($_GET['message']);
        $create_datetime = date("Y-m-d H:i:s");
        
        $query    = "INSERT into `frentals_contact` (name, email,message, date_time )
                     VALUES ('$username', '$email','$message', '$create_datetime')";
        
        $result   = mysqli_query($con, $query);
        if (!$result) {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
        if ($result) {
            echo "<div class='form'>
                  <h3>You are message sent successfully.</h3><br/>
                  <p class='link'>Click here to <a href='index.html'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='index.html'>registration</a> again.</p>
                  </div>";
        }
        $con -> close();
    }
    else{
        echo "not successful";
    } 
?>



