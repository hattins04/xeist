`CharSet = 'utf-8';

//Enable SMTP debugging. $mail->SMTPDebug = false;
//Set PHPMailer to use SMTP. $mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.elasticemail.com"; //Set this to true if SMTP host requires authentication to send email $mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "xyz";
$mail->Password = "xyz";
//If SMTP requires TLS encryption then set it $mail->SMTPSecure = "tls";
//Set TCP port to connect to $mail->Port = 2525;

$mail->From = $POST['email']; $mail->FromName = $POST['first_name'];

$mail->addAddress("xyz@gmail.com"); //CC and BCC $mail->addCC("xyz@outlook.com"); $mail->addBCC("");

$mail->isHTML(true);

$mail->Subject = "Nouveau message de " . $POST['first_name'] . $_POST['last_name']; $mail->Body = $_POST['message']."

From page: ". strreplace("http://", "", $SERVER['HTTP_REFERER']) . "
" . $SERVER ['HTTP_USER_AGENT'] ;

$response = array(); if(!$mail->send()) { $response = array('message'=>"Mailer Error: " . $mail->ErrorInfo, 'status'=> 0); } else { $response = array('message'=>"Message has been sent successfully", 'status'=> 1); }

/* send content type header */ header('Content-Type: application/json');

/* send response as json */ echo json_encode($response);

?> `
