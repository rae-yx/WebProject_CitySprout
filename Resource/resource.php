<?php
//Database connection file
include('database.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Citysprout</title>
    <link rel = "stylesheet" href = "resource.css" type = "text/css">
</head>
<body>
<header>
      <nav>

        <div class="dropdown">
            <img src="navbarimg/navbarlines.png" alt="Navigation Lines" onclick="toggleDropdown()">
          <div class="dropdown-content" id="dropdownContent">
            <a href="../HomePage/CSHomePage.html">HOME</a>
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

  <!-- Header Container with Hero Image -->
  <div id="header-container">
    <div class="hero1">
      <div class="text1">
        <h1>Resource Library</h1>
      </div>
    </div>
  </div>
  
  <!-- Search Bar -->
  <div class="searchbar">
    <form action="search.php" method="POST">
      <input type="text" name="search" placeholder="Find...">
      <button type="submit" name="submit">Search</button>
    </form>
    </div>

    <div class="image-container">
    <?php
    //Retrieve resources from database
    $sql = "SELECT * FROM images";
    //Store the results from the query
    $result = mysqli_query($conn, $sql);
    //Get number of rows from result
    $queryResults = mysqli_num_rows($result);
    if ($queryResults > 0) {
      //Loop through each row from result
        while ($row = mysqli_fetch_assoc($result)) {
          //Display resources information
            echo "<div class='image'>
            <img src='" . $row['image_path'] . "' alt='Image'>
            <p>" . $row['title'] . "</p>
          </div>";
        }
    }
    ?>
</div>

    <!-- Local section -->
    <div id="local-container">
    <div class="local-heading">
      <h1>Local Gardening Resources</h1>
    </div>
    </div>

    <div class="rectangle-container">
        <div class="rectangle">
            <h2>Rae's Gardening Supplies</h2>
            <p>No.1, Jalan Gembira, Taman Bahagia, 50370 Kuala Lumpur | raegarden@gmail.com | 012-7690-420</p>
            <p>10am - 9pm // Monday to Friday</p>
        </div>
        <div class="rectangle">
            <h2>Green Solution</h2>
            <p>5, Jalan PJS 13/15, Bandar Sunway, 47500 Selangor | greensolution@gmail.com | 014-5099-032</p>
            <p>10am - 10pm // Monday to Sunday</p>
        </div>
    </div>

  <footer>
      <p>Citysprout 2023 &copy;</p>
    </footer>
    <script src="template.js"></script>
</body>
</html>