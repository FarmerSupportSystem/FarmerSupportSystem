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

<body onload="setInterval(Banner,3000)">
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
            <a class="nav-link" aria-current="page" href="dindex.php"><b>Home</b></a>
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

<!-- for search bar -->
<?php 


?>
<!--end for search bar -->

  <!-- Data fetch from php -->
  <div class="fetch ">
    <?php
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Farmer";

    try {
      // Create a PDO instance
      $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      // Set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Prepare SQL statement to select data from the database
      $sql = "SELECT * FROM land_details";
      $stmt = $pdo->prepare($sql);

      // Execute prepared statement
      $stmt->execute();

      // Check if there are any rows returned
      if ($stmt->rowCount() > 0) {
        // Output data of each rowand 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
          if($row["ownership"] == "Public"){
    ?>
      
        
        
            <div class="lin"></div>
            <div class="container mt-3 land-details-container">
              <h4 class="text-center">Owner Name</h4>
              <p class="mt-4"><strong><?php echo $row["land_size"] ?> Hectare </strong></p>
              <p><strong><img src="location.png" width="20" height="20" alt=""> </strong><?php echo $row["village"] ?><span> , <?php echo $row["pincode"] ?></span></p>
              
              <p><?php echo $row["description"] ?></p>
              <p>Duration: <?php echo $row["duration"] ?></p>
              <p><strong>&#9990; <?php echo $row["contact"] ?></strong></p>
              <p><strong>&#8377; <?php echo $row["price"] ?></strong></p>

              <a href="pay.php?id=<?php echo $row["id"] ?>" class="btn m-3 btn-success">Book Now</a>
            </div>
          </div>
          
<?php
           } }
      } else {
        echo "No results found.";
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    // Close connection
    $pdo = null;
?>
</div>

<!--End Data fetch from php -->


<!-- FOOTER -->
<footer>
  <div>
    <h4>Contact Us</h4>
    <p>Email: farmersupport@gmail.com</p>
    <p>Phone: +91 8390095661</p>
  </div>

  <ul class="footer-links">
    <li><a href="dindex.php">Home</a></li>
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