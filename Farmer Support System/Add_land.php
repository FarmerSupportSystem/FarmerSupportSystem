<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Support - Add Land</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>

    <link rel="stylesheet" href="aHome.css">


    <!-- STYLE -->
    <style>
        .container {
            border: 1px solid black;
            padding: 20px;
            max-width: 50rem;
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
            max-width: 700px;
            margin: 0 auto;
            transition: box-shadow 0.4s ease;
        }

        .land-details-container:hover {
            box-shadow: 0 0 20px green;
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
                        <a class="nav-link" href="aprofile.php"><b>Profile</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- HEDER END -->

    <!-- LAND ADD -->
    <div class="land-details-container mb-4 mt-4">
        <h2 class="mb-4 text-center">Add Land Details</h2>

        <form action="aScript.php" method="POST" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="landName" class="form-label">Land Size:</label>
                <input type="text" class="form-control" name="landsize" placeholder="Enter land size in hectare" required>
            </div>

            <div class="mb-3">
                <label for="landSize" class="form-label">Area Pincode:</label>
                <input type="text" class="form-control" name="pincode" placeholder="Enter area pincode" required>
            </div>

            <div class="mb-3">
                <label for="village" class="form-label">Village :</label>
                <input type="text" class="form-control" name="village" placeholder="Enter village name" required>
            </div>

            <div class="mb-3">
                <label for="landSize" class="form-label">Discription:</label>
                <input type="textarea" class="form-control" name="description" placeholder="Enter brief discription" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Land Price:</label>
                <input type="text" class="form-control" name="price" placeholder="Enter land price" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration:</label>
                <input type="date" class="form-control" name="duration" required>
            </div>

            <div class="mb-3">
                <label for="contactNumber" class="form-label">Contact Number:</label>
                <input type="number" class="form-control" name="contact" placeholder="Enter contact number" required>
            </div>

            <div class="mb-3">
                <label for="ownership" class="form-label">Visibilty:</label><br>
                Public : <input type="radio" value="Public" name="ownership">
                Private : <input type="radio" value="Private" name="ownership">

            </div>

            <button type="reset" class="btn mt-4 btn-success">Reset</button>
            <button type="submit" class="btn mt-4 btn-success">Submit</button>
        </form>
    </div>


    <!-- LAND ADD END-->


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
                <img src="whatsapp.png" width=20 height=20 alt=""><i class="fab fa-whatsapp"></i></a>

            <a href="https://www.instagram.com/accounts/login/">
                <img src="instagram.png" width=20 height=20 alt=""><i class="fab fa-instagram"></i></a>

        </div>

        <div>
            <p>&copy; 2024 Farmer Support</p>
        </div>
    </footer>
    <!-- END FOOTER -->

</body>

</html>