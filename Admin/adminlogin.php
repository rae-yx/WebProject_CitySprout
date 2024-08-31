<?php
//Database connection file
require 'database.php';

//If the form is submitted
if(isset($_POST["submit"])){
    $username = $_POST["username"]; //Get username from the form
    $password = $_POST["password"]; //Get password from the form

    //Check if the username exists in the database
    $result = mysqli_query($conn,"SELECT * FROM adminaccount WHERE username = '$username'");
    
    //Get the first row from result
    $row = mysqli_fetch_assoc($result);
    
    //If a row with the matching username is found
    if(mysqli_num_rows($result)>0){
        //If password matches the password in database
        if($password == $row["password"]){
            //Set session variables
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            //Redirect users to home page
            header("Location: ../HomePage/adminhomepage.html");
            exit(); // Terminate the script
        }
            else{
                //If password is wrong, display an alert message
                echo "<script> alert('Invalid Password'); </script>";
            }
    }
    else{
        //If username is not found, display an alert message
        echo "<script> alert('User Not Registered'); </script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Citysprout</title>
    <link rel = "stylesheet" href = "adminlogin.css" type = "text/css">
</head>
<body>
    <header>
      <nav>

        <div class="center-section">
          <img src="navbarimg/citysproutlogo.png" alt="Logo">
        </div>

      </nav> 
    </header>
    <div class="flexparent">
        <div class="flexleft">
            Join us. Be a part of our welcoming community today!
            <img src="accountimage.png" alt="account">
        </div>
        
        <div class="flexright">

            <div class="title">Admin Login</div>
            <form action = "" method = "post">
            <label>Username</label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password</label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit" name="submit">Log In</button>
            </form>
        
            <a href="../ForgotPassword/forgotpassword.html">Forgot Password</a>
            <a href="../AccountCreation/accountcreate.php">New User? Create Account</a>
            <a href="../AccountLogin/accountlogin.php">User Login</a>
            
        </div>
    </div>
   
    <footer>
      <p>Citysprout 2023 &copy;</p>
    </footer>
    <script src="template.js"></script>
</body>
</html>