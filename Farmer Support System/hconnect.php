<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    // Handle image file upload
    $filename = $_FILES["image_f"]["name"];
    $tempname = $_FILES["image_f"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);

    // Handle other form fields
    $equipment_name = $_POST['equipment_name'];
    $model_name = $_POST['model_name'];
    $model_year = $_POST['model_year'];
    $rent_rate = $_POST['rent_rate'];
    $other_specification = $_POST['other_specification'];
    $owner_name = $_POST['owner_name'];
    $mobile_number = $_POST['mobile_number'];
    $email_id = $_POST['email_id'];
    $o_address = $_POST['o_address'];
    $state = $_POST['state'];
    $district= $_POST['district'];
    $taluka = $_POST['taluka'];
    $pincode = $_POST['pincode'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'farmer');
    if ($conn->connect_error) {
        die('Connection failed : ' . $conn->connect_error);
    } else {
        // Prepare and execute SQL query
        $stmt = $conn->prepare("INSERT INTO information (image_f, equipment_name, model_name, model_year, rent_rate, other_specification, owner_name, mobile_number, email_id, o_address,state,district,taluka, pincode)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiissssssssi", $folder, $equipment_name, $model_name, $model_year, $rent_rate, $other_specification, $owner_name, $mobile_number, $email_id, $o_address, $state, $district, $taluka, $pincode);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect to add.php after successful insertion
        header("Location: hHome.php");
        exit();
    }
}
?>
