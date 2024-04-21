<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Equipment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E4D5C7; /* Change background color to a light gray resembling farm/agri equipment page */
        }

       
       
        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 10px 16px;
            text-decoration: none;
        }

        .navbar-nav .nav-link {
            color: black !important; /* White */
            font-weight: bold;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 30px black;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select,
        textarea {
            width: calc(100% - 20px); /* Adjust width */
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
             /* Change button background color to green */
            color: white;
            padding: 10px 16px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 40%;
        
       }
        button:hover{
            background-color: green; /* Darken button color on hover */
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header>
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
            <a class="nav-link" aria-current="page" href="hHome.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Hprofile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- HEDER END -->
    </header>

    <div class="container">
        <h2><b>ADD AGRI-EQUIPMENT</b></h2>
        <br>

        <form  action="hconnect.php"  method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="picture">Image :</label>  
            <input type="file" name="image_f"><br><BR>

            <label for="equipmentname">Equipment Name :</label>
            <select name="equipment_name" required>
                <option value="select EQUIPMENT">Select Equipment</option>
                <option value="tractor">Tractor</option>
                <option value="harvester">Harvester</option>
                <option value="rice_machine">Rice Machine</option>
                <option value="spray">Spray</option>
                <option value="thresher">Thresher</option>
                <option value="tractor_attachments_applications">Tractor Attachments & Applications</option>
            </select><br>

            <label for="modelname">Company Name / Model Name:</label>
            <input type="text" id="modelname" name="model_name" placeholder="Enter Company name / model name" required><br>

            <label for="modelyear">Model Year :</label>
            <select name="model_year" required>
                <option value="select model year">Select model year</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <!-- Add the rest of the options here -->
            </select><br>

            <label for="rentrate">Rent Rate :</label>
            <input type="text" id="rent_rate" name="rent_rate" placeholder="Enter Rent Rate" required><br>

            <label for="other_specification">Other Specification :</label>
            <textarea id="other_specification" name="other_specification" rows="5" placeholder="Enter Equipment specification: Engine power, Tank capacity, Weight, Battery (Charging/Discharge time) and more...." required></textarea><br><br>
            
            <label for="owner_details"><b><u>OWNER DETAILS</u></b></label><br><br>

            <label for="owner_name">Owner Name:</label>
            <input type="text" id="owner_name" name="owner_name" placeholder="Enter Owner name" required><br>
            
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" required><br>
            
            <label for="email_id">Email Id:</label>
            <input type="text" id="email_id" name="email_id" placeholder="Enter Email Id" required><br>
            
            <label for="address">Address :</label>
            <textarea id="address" name="o_address" placeholder="Enter Your Address" required></textarea><br>

            <label for="state">State :</label>
            <select id="state" name="state">
            <option value="states">All States</option>
                <option value="maharashtra">Maharashtra</option>
                <!-- Add more options as needed -->
            </select>


            <label for="district"> Districts:</label>
            <select id="district" name="district">
                <!-- Populate with district names dynamically or manually -->
                <option value="all">All Districts</option>
                <option value="bhandara">Bhandara</option>
                <option value="nagpur">Nagpur</option>
                <option value="gondia">Gondia</option>
                <!-- Add more options as needed -->
            </select></br>

            <label for="taluka">Taluka:</label>
            <select id="taluka" name="taluka">
                <!-- Populate with taluka names dynamically or manually -->
                <option value="all">All Talukas</option>
                <option value="nagpur">Nagpur</option>
                <option value="ramtek">Ramtek</option>
                <option value="hingna">Hingna</option>
                <option value="nagpur rural">Nagpur rural</option>
                <option value="katol">Katol</option>
                <option value="kuhi">Kuhi</option>
                <option value="narkhed">Narkhed</option>
                <option value="umred">Umred</option>
                <option value="kalameshwar">Kalameshwar</option>
                <option value="kampteNagpur rurale">KampteNagpur rurale</option>
                <option value="parseoni">Parseoni</option>
                <option value="bhiwapur">Bhiwapur</option>
                <option value="savner">Savner</option>

                <option value="bhandara">Bhandara</option>
                <option value="tumsar">Tumsar</option>
                <option value="mohadi">Mohadi</option>
                <option value="pauni">Mauni</option>
                <option value="sakoli">Sakoli</option>
                <option value="lakhani">Lakhani</option>
                <option value="lakhandur">Lakhandur</option>
                
                <!-- Add more options as needed -->
            </select></br>

            <label for="pincode">Pincode:</label>
            <input type="text" id="pincode" name="pincode" placeholder="Enter Your Pincode" required><br><br>
           
            <button type="reset" class="bg-success">RESET</button>
            <button type="submit" class="bg-success" name="submit" onclick="return fun()">SUBMIT</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].hasAttribute("required") && inputs[i].value.trim() === "") {
                    alert("Please fill in all required fields.");
                    return false;
                }
            }
            var textarea = document.getElementsByTagName("textarea")[0];
            if (textarea.hasAttribute("required") && textarea.value.trim() === "") {
                alert("Please fill in all required fields.");
                return false;
            }
            var emailInput = document.getElementById("email_id");
            var email = emailInput.value.trim();
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailInput.hasAttribute("required") && !emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            var mobileInput = document.getElementById("mobile_number");
            var mobileNumber = mobileInput.value.trim();
            var mobilePattern = /^\d{10}$/;
            if (mobileInput.hasAttribute("required") && !mobilePattern.test(mobileNumber)) {
                alert("Please enter a valid 10-digit mobile number.");
                return false;
            }
        }

        // Function to show success message after form submission
        function fun() {
            if (confirm("Are you sure you want to submit?")) {
                alert("Successfully added!");
                return true; // Submit the form
            } else {
                return false; // Cancel submission
            }
        }
    </script>
</body>
</html>
