<?php
//Database connection file
require 'database.php';

//If the form is submitted
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneno = $_POST["phoneno"];
    $name = $_POST["name"];

    //Password validation
    if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        echo "<script> alert('Password must be at least 8 characters long and contain both letters and numbers.'); </script>";
    //Email validation
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Invalid email format.'); </script>";
    } else {
        //Check if the username or email exists in the database
        $duplicate = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            echo "<script> alert('Username or Email is taken'); </script>";
        } else {
            //Insert account details into the database
            $query = "INSERT INTO account VALUES ('', '$username', '$email', '$password', '$phoneno', '$name')";
            mysqli_query($conn, $query);
            echo "<script> alert('Account Successfully Created!'); </script>";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Citysprout</title>
    <link rel = "stylesheet" href = "accountcreate.css" type = "text/css">
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

            <div class="title">Create your Account</div>
            <form action = "" method = "post">
            <label>Username</label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Email</label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <label>Password</label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <label>Phone Number</label>
            <input type="text" placeholder="Enter Phone Number" name="phoneno" required> 
            <label>Full Name</label>
            <input type="text" placeholder="Enter Full Name" name="name" required>
            <button type="submit" name="submit">Sign Up</button>
            </form>
             
            <a href="../AccountLogin/accountlogin.php">Already have an account? Log In</a>
        </div>
    </div>
    
    <footer>
      <p>Citysprout 2023 &copy;</p>
    </footer>
    <script src="template.js"></script>
</body>
</html>