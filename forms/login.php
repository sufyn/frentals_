
<?php
    require('server.php');
    session_start();
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['submit'])) {
        // removes backslashes
        $username = stripslashes($_GET['name']);
        $_SESSION["name"] = $username;

        
        //escapes special characters in a string
        $password = stripslashes($_GET['password']);
        $query    = "SELECT * FROM `frentals_users` WHERE email='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['name'] = $username;
            // Redirect to user dashboard page
            header("Location: /frentals/main.html");
        } else {
            echo "<div class='form'>
                  <h3 class='php'>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='/frentals/index.html'>Login</a> again.</p>
                  </div>";
        
                  header("Location: /frentals/index.html");

        }
        $con -> close();
    }
    
    else{
        echo "not successful";
    }
?>
