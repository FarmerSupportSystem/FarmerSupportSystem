<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmer Support Payment</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="pay.css">
  <style>
  body {
  margin: 0;
  padding: 0;
width: 100%;
border: none;
    }

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
            <a class="nav-link" href="#"><b>Payment</b></a>
         </li>

      </div>
    </div>
  </nav>
  <!-- HEDER END -->
  <?php

  $id=$_GET['id'];
  // Database connection
  $conn = new mysqli('localhost', 'root', '', 'farmer');
  if ($conn->connect_error) {
      die('Connection failed : ' . $conn->connect_error);
  } else {
      $sql = "SELECT * FROM land_details WHERE id = '$id'"; // Assuming 'harshal' is the table name
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {

?>

  <div class="pay">
    <a href="aHome.php">
      <span class="back-arrow">&larr;</span>
    </a>
    <h1>Farmer Support Payment</h1>
    <form id="paymentForm" action="onlinepay.php" method="POST">

      <label for="amount">Amount:</label>
      <input id="amount" name="amount" value="<?php echo $row["price"]?>"><br><br>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br><br>

      <label for="email">Email:</label>
      <input type="email" id="email"  name="email" required><br><br>

      <label for="phone">Phone:</label>
      <input type="tel" id="phone"  value="<?php echo $row["contact"]?>" name="phone" required><br><br>
      
      <button type="submit">Pay Now</button>
    </form>
  </div>

<?php
         
}
      } else {
          echo "0 results";
      }
      $conn->close();
  }
?>

  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script src="pa.js"></script>

 

</body>

</html>