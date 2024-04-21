<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Land Details</title>
  <!-- Add Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="aHome.css">

  <style>
    footer {
      margin-top: 10%;
    }

    .container {
      border: 1px solid black;
      padding: 20px;
      max-width: 70%;
      margin-bottom: 20px
    }

    .nav-link:hover {
      background: #E4D5C7;
      color: black;
      border-radius: 5px;
    }

    .land-details-container {

      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      max-width: 600px;
      margin: 0 auto;
      box-shadow: 0 0 30px black;

    }

    .prodata {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 10px;
      max-width: 95%;
      margin: 10px auto;
      transition: box-shadow 0.4s ease;
    }

    .prodata:hover {
      box-shadow: 0 0 10px green;
    }

    .btnn {
      border: 1px solid black;
      margin-left: 10px;
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
            <a class="nav-link" aria-current="page" href="aHome.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#"><b>Profile</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="payhistory.php">Payment History</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- HEDER END -->


  <div class="container mt-4 land-details-container">
    <h4 class="text-center mb-5">Owner Name</h4>
    <!-- Data fetch from php -->

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
        // Output data of each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>

          <div class="prodata">
            <p class="mt-4"><img src="earth.png" width="25" height="25"> <strong><?php echo $row["land_size"] ?> Hectare ;</strong>
              <strong><img src="location.png" width="20" height="20" alt=""> </strong><?php echo $row["village"] ?>
              <strong>; &#8377;<?php echo $row["price"] ?></strong>

              <a href="aUpdate.php?id=<?php echo $row["id"] ?>"  class="btn btnn btn-sm"  ><?php echo $row["ownership"] ?></a>
              <a href="aDelete.php?id=<?php echo $row["id"] ?>" onclick=" return confirm('Are you sure , you want to delet?')" style="float: right"  class="btn  btn-sm btn-danger" >Delete</a>
            </p>
          </div>

          <!-- toggel -->
          <script>
            const statusButton = document.getElementById('status');
            const currentStatus = statusButton.innerText;

            function toggle() {
              // Assuming you want to confirm before deleting
              if (confirm("Are you sure you want to delete?")) {
                // If confirmed, submit the form
                statusButton.innerText = 'Deleting...'; // Update button text
                <?php ?>
              }
            }
          </script>

          <!-- toggle end -->
    <?php
        }
      } else {
        echo "No results found.";
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    // Close connection
    $pdo = null;
    ?>
    <a href="Add_land.php" class="btn mt-5 m-3 btn-success"><b>+</b> Add</a>
  </div>
  

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

    <div>
      <p>&copy;  2024 Farmer Support</p>
    </div>
  </footer>
  <!-- END FOOTER -->

</body>

</html>