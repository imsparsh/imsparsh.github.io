<?php
require 'PHPMailerAutoload.php';

if(isset($_POST['c_name']) && isset($_POST['c_message']) && isset($_POST['c_email'])){
    
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'connect@imsparsh.com';                 // SMTP username
$mail->Password = 'Iamrock6666';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'noreply@amorsphe.com';
$mail->FromName = 'Imsparsh Web';
$mail->addAddress('sparsh025@yahoo.com', 'Imsparsh Yahoo');     // Add a recipient
$mail->addAddress('sparsh.755@gmail.com', 'Imsparsh Gmail');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Imsparsh Web Contact | ".$_POST['c_name']." | ".$_POST['c_email'];
$mail->Body    = "<div style='padding: 40px 20px; box-shadow: 0 0 10px black;'><h1>Imsparsh Web Mail</h1><br><br>Message from : <b>".$_POST['c_name']." | ".$_POST['c_email']."</b><br><br><br> MESSAGE : <br><br>".$_POST['c_message']."</div>";
$mail->AltBody = "Message from : ".$_POST['c_name']." | ".$_POST['c_email']."\n\n\n\n MESSAGE : \n\n".$_POST['c_message']."";

	if(!$mail->send()) {
		$res['sendstatus'] = 1;
		$res['message'] = 'Error Occurred. Please try after some time.';
		echo json_encode($res);	   
	} else {
		$res['sendstatus'] = 1;
		$res['message'] = 'Thank you for contacting. I will reach you asap.';
		echo json_encode($res);
	}

}
else
{
    $res['sendstatus'] = 0;
    $res['message'] = 'Message Failed. Please try after some time.';
    echo json_encode($res);
    
}

?>