<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Citysprout</title>
    <link rel = "stylesheet" href = "checkout.css" type = "text/css">
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

    <div class="title">
      Checkout
    </div>

    <div class="parentflex">

      <div class="shippingdetails">
        <form action="process_checkout.php" method="post">

          <h3>Shipping Details</h3>
          <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
          <input type="text" id="last_name" name="last_name" placeholder="Last Name" required><br>
          <input type="email" id="email" name="email" placeholder="Email (e.g. sprout@citysprout.com)" required><br>

          <h3>Shipping Address</h3>
          <input type="text" id="address" name="address" placeholder="Full Address" required><br>

          <h3>Payment Options</h3>
          <input type="radio" id="onlinebanking" name="payment" value="Online Banking" required>
          <label for="onlinebanking">Online Banking</label><br>
          <input type="radio" id="ewallet" name="payment" value="E-Wallet" required>
          <label for="ewallet">E-Wallet</label><br>
          <input type="radio" id="cod" name="payment" value="Cash on Delivery" required>
          <label for="cod">Cash on Delivery</label><br>
          <input type="radio" id="credit" name="payment" value="Store Credit (Balance: RM25.80)" required>
          <label for="credit">Store Credit (Balance: RM25.80)</label><br>

          <input type="submit" name="submit" value="Checkout">
        </form>
      </div>

      <div class="checkout-items">
        <h3>Checkout Items</h3>
        <ul>
          <?php
          //If 'items' parameter is set
          if (isset($_GET['items'])) {
            //Get items
              $items = $_GET['items'];
              //Loop through each item from items array
              foreach ($items as $item) {
                //Output each item
                  echo '<li>' . htmlspecialchars($item) . '</li>';
              }
          }
          ?>
            
        </ul>
    </div>

    </div>

    <footer>
      <p>Citysprout 2023 &copy;</p>
    </footer>
    <script src="checkout.js"></script>
    <script>
        // Timeout function
        const timeoutDuration = 10000;
        let timeout;

        // Redirect to login page
        const redirectLoginPage = () => {
            window.location.href = '../AccountLogin/accountlogin.php'; // Replace 'login.html' with your actual login page URL
        };

        // Function to reset the timeout
        const resetTimeout = () => {
            clearTimeout(timeout);
            timeout = setTimeout(redirectLoginPage, timeoutDuration);
        };

        // Event listeners to detect user interactions and reset the timeout
        document.addEventListener('mousemove', resetTimeout);
        document.addEventListener('keypress', resetTimeout);

        // Initial start of the timeout
        resetTimeout();
    </script>
</body>
</html>

