<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $otp=$_POST['otp'];
    $gotp=$_POST['gotp'];

    if($gotp==$otp){
        header("Location: dindex.php");
    }else{
        echo "<h3>Enter valid OTP</h3>";

    }
}
?>