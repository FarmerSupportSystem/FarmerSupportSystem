<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

<?php
$email=$_GET['eml'];

include('smtp/PHPMailerAutoload.php');

$otp=rand(100000,999999);
$receiverEmail=$email;
$subject="Email Verification";
$emailbody="Your 6 Digit OTP Code: ";

echo smtp_mailer($receiverEmail,$subject,$emailbody.$otp);

function smtp_mailer($to,$subject, $msg){
global $email;
global $otp;

	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "namtembhekar@gmail.com"; //write sender email address
	$mail->Password = "izsrcdudaczuxjhn"; //write app password of sender email
	$mail->SetFrom("namtembhekar@gmail.com"); //write sender email address
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{

		// header("Location: sin.php?eml=$email");
		?>

<form id="myForm" action="sin.php" method="post">
	<input type="text" name="eml" value="<?php echo $email ?>"><br>
	<input type="text" name="otp" value="<?php echo $otp ?>"><br>
	<input type="submit" value="Submit" >
</form>
<script>
    // Auto-submit the form when the page loads
    window.onload = function() {
        document.getElementById("myForm").submit();
    };
</script>

		<?php
		// echo "We've sent 6 Digit OTP code to your email: ".$to;
	}
}
?>

</body>

</html>