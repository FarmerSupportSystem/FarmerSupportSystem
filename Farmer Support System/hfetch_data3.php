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
    $sql = "SELECT * FROM information WHERE equipment_name='harwester'";
    $types = ""; // Variable to store parameter types
    $values = []; // Variable to store parameter values

    if (!empty($state)) {
        $sql .= " AND state = ?";
        $types .= "s";
        $values[] = $state;
    }
    if (!empty($district)) {
        $sql .= " AND district = ?";
        $types .= "s";
        $values[] = $district;
    }
    if (!empty($taluka)) {
        $sql .= " AND taluka = ?";
        $types .= "s";
        $values[] = $taluka;
    }
   

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        if (!empty($types)) {
            $stmt->bind_param($types, ...$values);
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
                echo "<p>talukae: " . htmlspecialchars($row["taluka"]) . "</p>";
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