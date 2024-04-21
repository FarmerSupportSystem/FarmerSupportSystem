<?php
$id = $_GET['id'];
// echo $id;



$conn = new mysqli('localhost', 'root', '', 'farmer');
if ($conn->connect_error) {
    die('Connection failed : ' . $conn->connect_error);
}

$sql = "DELETE FROM information WHERE sr_no = '$id' ";
$stmt = $conn->prepare($sql);


if (!$stmt->execute()) {
    die('Error in executing statement: ' . $stmt->error);
}

$stmt->close();
$conn->close();

header("Location: Hprofile.php");
exit;
