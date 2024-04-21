<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "Farmer";

// Establish a connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $landSize = $_POST["landsize"];
    $pincode = $_POST["pincode"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $duration = $_POST["duration"];
    $contact = $_POST["contact"];
    $ownership = $_POST["ownership"];
    $village = $_POST["village"];

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO land_details (land_size, pincode, village, price, duration, contact, description, ownership ) 
            VALUES ('$landSize', '$pincode', '$village', '$price', '$duration', '$contact', '$description', '$ownership')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>";
        echo "alert('Land details add successfully');";
        echo "</script>";
        header("Location: aprofile.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
