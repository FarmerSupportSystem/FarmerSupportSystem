<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];


    // Query to check if user exists
    $sql = "SELECT * FROM harsh WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, redirect to home page

        header("Location: delOtp.php?eml=$email");
        exit;
    } else {
        // User does not exist or credentials are incorrect
        echo "Invalid email";
    }
}

// Close the database connection
$conn->close();

?>