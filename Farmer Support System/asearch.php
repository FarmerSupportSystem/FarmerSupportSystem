<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmer Support</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="aHome.css">
<style>
    footer {
      margin-top: 10%;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      position: relative;
    }

    .nav-link:hover {
      background: #E4D5C7;
      color: black;
      border-radius: 5px;
    }
  
    .fetch {
      display: flex;
      max-width: 100%;
      flex-wrap: wrap;
    }

    .lin {
      margin-top: 20px;
      border-top: 5px solid green;
      max-width: 100%;
    }

    .land-details-container {

      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      max-width: 500px;
      margin: 0 auto;
    transition: box-shadow 0.3s ease; /* Adding transition for smooth effect */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0);
    }

    .land-details-container:hover {
      box-shadow: 0 10px 30px rgba(0, 128, 0, 0.6); /* Large shadow on hover */
}
  </style>

</head>
<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container-fluid">
      <h2 class="navbar-brand mb-0" href="#"> <img src="farmer.png" width=50 height=50 alt=""></h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="aHome.php"><b>Home</b></a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="aprofile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>

        </ul>
        <form class="d-flex" action="asearch.php" role="search" method="POST">
          <input class="form-control me-3" type="search" placeholder="Search Using Pincode" name="search" aria-label="Search">
          <button class="btn btn-outline-dark" type="submit" >Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- HEDER END -->



<?php
// Assuming you have a MySQL database setup
$servername = "localhost"; // Change this if your MySQL server is running on a different host
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "farmer"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve search parameters
    // $price = $_POST['search'];
    // $area = $_POS['search'];
    $pincode = $_POST['search'];

    // Construct the SQL query  price <='$price'
    $sql = "SELECT * FROM land_details WHERE pincode = '$pincode'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Output the land details as before
            if($row["ownership"] == "Public"){
                

            echo "<div class='land-details-container mt-3'>";
            echo "<h4 class='text-center'>Owner Name</h4>";
            echo "<p class='mt-4'><strong>" . $row["land_size"] . " Hectare</strong></p>";
            echo "<p><strong><img src='location.png' width='20' height='20' alt=''> </strong>" . $row["village"] . ", " . $row["pincode"] . "</p>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p>Duration: " . $row["duration"] . "</p>";
            echo "<p><strong>&#9990; " . $row["contact"] . "</strong></p>";
            echo "<p><strong>&#8377; " . $row["price"] . "</strong></p>";
            echo "</div>";
            }
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "Search parameters not provided.";
}

// Close connection
$conn->close();
?>

<!-- FOOTER -->
<footer>
  <div>
    <h4>Contact Us</h4>
    <p>Email: farmersupport@gmail.com</p>
    <p>Phone: +91 8390095661</p>
  </div>

  <ul class="footer-links">
    <li><a href="aHome.php">Home</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">FAQs</a></li>
  </ul>

  <div class="social">
    <h4>Connect With Us</h4>
    <!-- Add your social media icons or links here -->

    <a href="https://www.facebook.com/">
      <img src="facebook.png" width=20 height=20 alt=""><i class="fab fa-facebook"></i></a>

    <a href="https://web.whatsapp.com/">
      <img src="whatsapp.png" width=20 height=20 alt=""> <i class="fab fa-whatsapp"></i></a>

    <a href="https://www.instagram.com/accounts/login/">
      <img src="instagram.png" width=20 height=20 alt=""> <i class="fab fa-instagram"></i></a>


  </div>

  <div class="mt-3">
    <p>&copy; 2024 Farmer Support</p>
  </div>
</footer>
<!-- END FOOTER -->


</body>
</html>