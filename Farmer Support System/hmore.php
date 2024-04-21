<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Equipment</title>
    <link rel="stylesheet" href="hall_stylesheet.css">
</head>

<body>
    <header>
        <div id="navbar" class="navbar">
            <!-- Your navigation links go here -->
            <a href="hHome.php">Home</a>
            <a href="hadd.php">Add-Equipment</a>
            
            <a href="about.php">About</a>
        </div>
    
    <div id="filters">
    <form class="d-flex" role="search" action="">
    <label for="state">State:</label>
            <select id="state">
            <option value="states">All States</option>
                <option value="maharashtra">Maharashtra</option>
                <!-- Add more options as needed -->
            </select>

            <label for="district">District:</label>
            <select id="district">
                <!-- Populate with district names dynamically or manually -->
                <option value="all">All Districts</option>
                <option value="bhandara">Bhandara</option>
                <option value="nagpur">Nagpur</option>
                <option value="gondia">Gondia</option>
                <!-- Add more options as needed -->
            </select>

            <label for="taluka">Taluka:</label>
            <select id="taluka">
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
            </select>


            <button type="button" id="search_btn" class="btn-outline-dark">Search</button>

        </form>
    </div>

</header>

<fieldset class="fieldset">
    <legend align="center">Search Result</legend>
    <div id="searchresults" class="profile-container">
        <!-- Search results will be displayed here -->
        <?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'farmer');
if ($conn->connect_error) {
    die('Connection failed : ' . $conn->connect_error);
} else {
    // Check if GET parameters are set
    $state = isset($_GET['state']) ? $_GET['state'] : '';
    $district = isset($_GET['district']) ? $_GET['district'] : '';
    $taluka = isset($_GET['taluka']) ? $_GET['taluka'] : '';

    // Construct the SQL query based on the provided filters
    $sql = "SELECT * FROM information WHERE equipment_name = 'tractor_attachments_applications'";
    $conditions = []; // Array to store conditions
    $params = []; // Array to store parameter values

    if (!empty($state) && $state != 'all states') {
        $conditions[] = "state = ?";
        $params[] = $state;
    }
    if (!empty($district) && $district != 'all') {
        $conditions[] = "district = ?";
        $params[] = $district;
    }
    if (!empty($taluka) && $taluka != 'all') {
        $conditions[] = "taluka = ?";
        $params[] = $taluka;
    }

    // Add WHERE clause if conditions are present
    if (!empty($conditions)) {
        $sql .= " AND " . implode(" AND ", $conditions);
    }

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Assuming all parameters are strings
            $stmt->bind_param($types, ...$params);
        }

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Output sanitized data
                echo '<div class="profile">';
                echo "<img src='" . htmlspecialchars($row["image_f"]) . "'>";
                echo '<hr>';
                echo "<p>Equipment Name: " . htmlspecialchars($row["equipment_name"]) . "</p>";
                echo "<p>Model Name: " . htmlspecialchars($row["model_name"]) . "</p>";
                echo "<p>Model Year: " . htmlspecialchars($row["model_year"]) . "</p>";
                echo "<p>Rent Rate: " . htmlspecialchars($row["rent_rate"]) . "</p>";
                echo "<p>Other Specification: " . htmlspecialchars($row["other_specification"]) . "</p>";
                echo '<hr>';
                echo "<p>owner Name: " . htmlspecialchars($row["owner_name"]) . "</p>";
                echo "<p>mobile no: " . htmlspecialchars($row["mobile_number"]) . "</p>";
                echo "<p>email id: " . htmlspecialchars($row["email_id"]) . "</p>";
                echo "<p>address: " . htmlspecialchars($row["o_address"]) . "</p>";
                echo "<p>state: " . htmlspecialchars($row["state"]) . "</p>";
                echo "<p>district: " . htmlspecialchars($row["district"]) . "</p>";
                echo "<p>taluka: " . htmlspecialchars($row["taluka"]) . "</p>";
                echo "<p>PINCODE: " . htmlspecialchars($row["pincode"]) . "</p>";
                echo '</div>';
            }
        } else {
            echo "0 results";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error in preparing statement.";
    }

    $conn->close();
}
?>
</div>
</fieldset>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const state = document.getElementById('state');
    const district = document.getElementById('district');
    const taluka = document.getElementById('taluka');
    const searchBtn = document.getElementById('search_btn');

    const districts = {
        maharashtra: ["All Districts", "bhandara", "gondia", "nagpur"],
        // Add districts for other states as needed
    };

    const talukas = {
        bhandara: ["All Talukas", "tumsar","sakoli","lakhandur","pauni","lakhani", "mohadi", "bhandara"],
        nagpur: ["All Talukas", "nagpur", "ramtek","umred","mouda","kuhi"],
        // Add talukas for other districts as needed
    };

    state.addEventListener('change', function () {
        const selectedState = state.value;
        populateOptions(district, districts[selectedState]);
    });

    district.addEventListener('change', function () {
        const selectedDistrict = district.value;
        populateOptions(taluka, talukas[selectedDistrict]);
    });

    searchBtn.addEventListener('click', function () {
        const selectedState = state.value;
        const selectedDistrict = district.value;
        const selectedTaluka = taluka.value;

        const xhr = new XMLHttpRequest();
        xhr.open("GET", "hfetch_data6.php?state=" + selectedState + "&district=" + selectedDistrict + "&taluka=" + selectedTaluka ,true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("searchresults").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
});

function populateOptions(selectElement, options) {
    selectElement.innerHTML = '';
    options.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        selectElement.appendChild(optionElement);
    });
}
</script>


    <!-- FOOTER -->
<footer >
    <div >
            <h4>Contact Us</h4>
            <p>Email: farmersupport@gmail.com</p>
            <p>Phone: +91 8390095661</p>
    </div>

        <ul class="footer-links">
            <li><a href="dindex">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">FAQs</a></li>
        </ul>

        <div class="social">
            <h4>Connect With Us</h4>
            <!-- Add your social media icons or links here -->

            <a href="https://www.facebook.com/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg><i class="fab fa-facebook"></i></a>

            <a href="https://web.whatsapp.com/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                </svg><i class="fab fa-whatsapp"></i></a>

            <a href="https://www.instagram.com/accounts/login/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                </svg><i class="fab fa-instagram"></i></a>

        </div>

        <div class="mt-3">
            <p>&copy; 2024 Farmer Support</p>
        </div>
    </footer>
    <!-- END FOOTER -->


</body>

</html>