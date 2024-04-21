<?php 
include 'aScript.php';
$id=$_GET['id'];


$conn = new mysqli('localhost', 'root', '', 'farmer');
if ($conn->connect_error) {
    die('Connection failed : ' . $conn->connect_error);
}

$query="SELECT ownership FROM land_details WHERE id='$id' ";
$dataOwner=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($dataOwner)){

$ownership = $row['ownership'];
}

if($ownership=="Public"){
    $ownership="Private";
}else{
    $ownership="Public";
}


$sql = "UPDATE land_details SET ownership='$ownership' WHERE id='$id'";
$stmt = $conn->prepare($sql);


if (!$stmt->execute()) {
    die('Error in executing statement: ' . $stmt->error);
}

$stmt->close();
$conn->close();

header("Location: aprofile.php");
exit;









 ?>