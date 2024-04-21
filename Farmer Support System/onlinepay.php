<?php
// Database connection
$servername = "localhost"; // Change this to your database server name if it's different
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "farmer"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $amount = $_POST["amount"];
    
    // Function to generate transaction ID
    function generateCode($length = 16)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }
    
    // Generate transaction ID
    $tid = generateCode();

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO payments (name, email, contact, amount, transaction) VALUES (?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("sssis", $name, $email, $phone, $amount, $tid);

    // Execute statement
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Redirect after submission
    header("Location: aHome.php");
    exit();
}
?>
