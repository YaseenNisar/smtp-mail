<?php
include('database.inc');
$msg="";
if (isset($_POST['submit'])){
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);


mysqli_query ($con, "INSERT INTO contact_us (name, email) VALUES ('$name', '$email')");

 $msg="thanks for visiting";

$html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr></table>";


// include('smtp/PHPMailerAutoload.php');
// $mail=new PHPMailer (true);
// $mail->isSMTP();
// $mail->Host="smtp.gmail.com";
// $mail->Port=25;
// $mail->SMTPSecure="tls";
// $mail->SMTPAuth=true;
// $mail->Username="myaseennisar@gmail.com";
// $mail->Password="letmein001";
// $mail->SetFrom("myaseennisar@gmail.com");
// $mail->addAddress("myaseennisar@gmail.com");
// $mail->IsHTML(true);
// $mail->Subject="New Contact Us";
// $mail->Body=$html;
// $mail->SMTPOptions=array('ssl'=>array(
// 'verify_peer'=>false,
// 'verify_peer_name'=>false,
// 'allow_self_signed'=>false
// ));

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";


if($mail->send()){
	echo "Mail send";
}
else "Error occured";

}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Contact Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container contact">
         
            <div class="col-md-9">
               <form method="post">
					<div class="contact-form">
					  <div class="form-group">
						 <label class="control-label col-sm-2" for="name">Name:</label>
						 <div class="col-sm-10">          
							<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
						 </div>
					  </div>
					  <div class="form-group">
						 <label class="control-label col-sm-2" for="email">Email:</label>
						 <div class="col-sm-10">
							<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
						 </div>
					  </div>
					  <div class="form-group">
						 <div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default" name="submit">Submit</button>
							<span style="color:red;" id="msg"></span>
						 </div>
					  </div>
				   </div>
			   </form>
            </div>
         </div>
      </div>
	  <!-- <script>
	  jQuery('#frmContactus').on('submit',function(e){
		jQuery('#msg').html('');
		jQuery('#submit').html('Please wait');
		jQuery('#submit').attr('disabled',true);
		jQuery.ajax({
			url:'submit.php',
			type:'post',
			data:jQuery('#frmContactus').serialize(),
			success:function(result){
				jQuery('#msg').html(result);
				jQuery('#submit').html('Submit');
				jQuery('#submit').attr('disabled',false);
				jQuery('#frmContactus')[0].reset();
			}
		});
		e.preventDefault();
	  });
	  </script> -->
   </body>
</html>