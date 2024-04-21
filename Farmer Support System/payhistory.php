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

    /* for table */
    .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      font-family: sans-serif;
      min-width: 90%;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: left;
    }

    .styled-table th,
    .styled-table td {
      padding: 12px 15px;
    }

    .styled-table tbody tr {
      border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
      background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
      border-bottom: 2px solid #009879;
    }

    .styled-table tbody tr.active-row {
      font-weight: bold;
      color: #009879;
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
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="payhistory.php"><b>Payment History</b></a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- HEDER END -->

  <?php
  // $id=$_GET['id'];
  // Database connection
  $conn = new mysqli('localhost', 'root', '', 'farmer');
  if ($conn->connect_error) {
    die('Connection failed : ' . $conn->connect_error);
  } else {
    $sql = "SELECT * FROM payments "; // WHERE id = '$id'  Assuming 'harshal' is the table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
  ?>
      <table class="styled-table" cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Amount</th>
            <th>Transaction</th>
          </tr>
        </thead>
      </table>
      <?php

      while ($row = $result->fetch_assoc()) {
      ?>

        <table class="styled-table" cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['contact']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td><?php echo $row['transaction']; ?></td>
            </tr>
          </tbody>
        </table>
  <?php
      }
    }

    $conn->close();
  }
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

    <div>
      <p>&copy; 2024 Farmer Support</p>
    </div>
  </footer>
  <!-- END FOOTER -->

</body>

</html>