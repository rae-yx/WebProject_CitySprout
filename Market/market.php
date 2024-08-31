<?php
//Database connection file
include('database.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Citysprout</title>
    <link rel = "stylesheet" href = "market.css" type = "text/css">
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

<div id="market">
    <p>Marketplace<p>
    </div>

  <!-- Section for Best Sellers -->
<div id="bs-div">
    <h1 style="font-weight: 700; font-size: 40px; font-family: SansitaOne; color: #F9F2E5;">Best Sellers</h1>

  <div id="bs-container">
  <?php
    //Retrieve products from database
    $sql = "SELECT * FROM products";
    //Store the results from the query
    $result = mysqli_query($conn, $sql);
    //Get number of rows from result
    $queryResults = mysqli_num_rows($result);
    if ($queryResults > 0) {
      //Loop through each row from result
        while ($row = mysqli_fetch_assoc($result)) {
          //Display products information
            echo "<div class='ShopPrice'>
            <img class='ShopImage' src='" . $row['product_image'] . "' alt='Image'>
            <p>" . $row['product_name'] . "</p>
            <p>" . "RM" . $row['product_price'] . "</p>
            <button class = 'addToCartButton'>Add to Cart</button>
          </div>";
        }
    }
    ?>
  </div>
</div>

    <!-- Section for Search by Category -->
<div id="category-div">

  <div class="title">
    <h1>Search by Category</h1>
  </div>

    <div id="category-container">
    <div class="ShopPrice">
        <img class="ShopImage" src="soil.png" alt=""> <br> <br>
        <p>Soil and Fertilisers</p>
        </div>
    <div class="ShopPrice">
        <img class="ShopImage" src="tools.png" alt=""> <br> <br>
        <p>Gardening Tools</p>
        </div>
    <div class="ShopPrice">
        <img class="ShopImage" src="seeds.png" alt=""> <br> <br>
        <p>Seeds</p>
        </div>
    </div>
</div>

<footer>
      <p>Citysprout 2023 &copy;</p>
    </footer>
    <script src="template.js"></script>
</body>
</html>