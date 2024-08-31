<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $payment = $_POST['payment']; // Assuming this is the payment option

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        } else {
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "citysprout";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert data into the database
            $sql = "INSERT INTO citysprout.shippinginfo (first_name, last_name, email, address, payment)
                    VALUES ('$first_name', '$last_name', '$email', '$address', '$payment')";

            if ($conn->query($sql) === TRUE) {
                header("refresh:5;url=../Homepage/CSHomePage.html");
                echo "Thank you for your order. You will be redirected to the homepage in 5 seconds.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
} else {
    header("refresh:5;url=../Homepage/CSHomePage.html");
    echo "Order unsuccessful. You will be redirected to the homepage in 5 seconds.";
}
?>
