<?php
include('database.inc.');
$msg="";
if(isset($_POST['name']) && isset($_POST['email'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	
mysqli_query ($con, "INSERT INTO contact_us (name, email) VALUES ('$name', '$email')");


	
	$html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr></table>

include('smtp/PHPMailerAutoload.php');
$mail=new PHPMailer (true);
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->Port=25;
$mail->SMTPSecure="tls";
$mail->SMTPAuth=true;
$mail->Username="myaseennisar@gmail.com";
$mail->Password="letmein001";
$mail->SetFrom("myaseennisar@gmail.com");
$mail->addAddress("myaseennisar@gmail.com");
$mail->IsHTML(true);
$mail->Subject="New Contact Us";
$mail->Body=$html;
$mail->SMTPOptions=array('ssl'=>array(
'verify_peer'=>false,
'verify_peer_name'=>false,
'allow_self_signed'=>false
));


if($mail->send()){
	echo "Mail send";
}
else "Error occured";

}
echo $msg;

}

?>
