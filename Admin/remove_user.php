<?php
//Database connection file
require 'database.php';

//If the account id is set
if (isset($_GET['account_id'])) {
    $account_id = $_GET['account_id']; //Get the account id

    // Perform deletion from the table in database
    $delete_query = "DELETE FROM account WHERE account_id = $account_id";

    //If the delete query is successfully executed
    if (mysqli_query($conn, $delete_query)) {
        echo "User with ID $account_id has been successfully removed.";
    } else {
        echo "Error removing user: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Remove User</title>
    <link rel = "stylesheet" href="remove_user.css" type = "text/css">
</head>
<body>
<header>
        <nav>
          <div class="dropdown">
              <img src="navbarimg/navbarlines.png" alt="Navigation Lines" onclick="toggleDropdown()">
            <div class="dropdown-content" id="dropdownContent">
              <a href="../HomePage/adminhomepage.html">HOME</a>
              <a href="../About/about.html">ABOUT US</a>
              <a href="../Resource/resource.php">RESOURCES</a>
              <a href="../Market/market.php">MARKETPLACE</a>
            </div>
          </div>
          
          <div class="center-section">
            <img src="navbarimg/citysproutlogo.png" alt="Logo">
          </div>
  
          <div class="right-section">
            <a href="../Cart/cart.html"><img src="navbarimg/cart.png" alt="Cart"></a>
          </div>
  
        </nav> 
      </header> 
    <div class="usercontainer">
    <h1>Remove Users</h1>
    <ul>
        <?php
        $fetch_users_query = "SELECT * FROM account";
        $result = mysqli_query($conn, $fetch_users_query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['username']} - <a href='remove_user.php?account_id={$row['account_id']}'>Remove</a></li>";
        }
        ?>
    </ul>
    </div>

    <footer>
      &copy; Citysprout 2023
    </footer>
    <script src="template.js"></script>

</body>
</html>
