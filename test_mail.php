<?php
require 'mail_class/PHPMailerAutoload.php';
// @define('EMAIL', 'orcs-noreply@assamforestonline.in');
// 	@define('PASS', 'Alerts@123');
ini_set('display_errors', '1');
@define('EMAIL', 'megatronnindia@gmail.com');
    @define('PASS', 'uxld zhxp nhjv sdku');


	// function send_mail_schedule($connection,$to,$nameto,$cc,$subject,$message,$mail_no,$mail_type,$recepient_id,$message_to,$message_from){

	$to='thirupathi.013@gmail.com';
	$nameto='thirupathi';
	$cc_arr=array();
	$subject='subject';
	$message='message';
	$mail_no='mail_no';
	$mail_type='mail_type';
	$recepient_id='recepient_id';
	$message_to='message_to';
	$message_from='message_from';
	$heading_type='heading';

	$email_body_msg = "";
	$email_body_msg .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>AMTRON eMail</title>
	<style type="text/css">
		#mbody{padding:20px; margin:0 20px;}
		#mpbody{margin:15px 20px;}
		.main_body{border: 1px solid #e5e5e5; margin: 20px 50px; text-align: center; display: inline-block;}
		#mhead{background:#070157db; color:#fff !important; padding: 10px 20px;}
		#mfooter{background: #1f1303; padding: 10px 20px; color:#fff;}
		#mfooter img{height:40px; width:40px;}
		#mhead h3, #mhead h5, #mhead b{ margin:0; padding:0; color:#fff;}
	</style>
	</head>
	<body class="em_body" style="margin:0px; padding:0px;" bgcolor="#efefef">
		<table align="center" class="main_body">
			<tr><td align="center" id="mhead">
				<table width="100%">
					<tr>
						<td width="100%" align="center"><h5>Header</h5></td>
					</tr>
				</table>
			</td></tr>
			<tr><td>
				<table width="100%" id="mpbody">
					<tr>
						<td align="center"><b><u>'.$heading_type.'</u></b></td>
					</tr>
					<tr>
						<td align="left">'.$message_to.'</td>
					</tr>
					<tr>
						<td id="mbody" align="left"> '.$message.'</td>
					</tr>
					<tr>
						<td align="left">'.$message_from.'</td>
					</tr>
				</table>
			</td></tr>
			<tr><td align="center" id="mfooter">
			<b>Footer</b>
			</td></tr>
		</table>
	</body>
	</html>';

	// echo $email_body_msg;
	// exit;

		$mail = new PHPMailer;
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		// 3 = Enable verbose debug output
		// 4 = server and client debug output
		$mail->SMTPDebug = 2;				
		$mail->Debugoutput = 'html';                               

		$mail->isSMTP();                                      // Set mailer to use SMTP
		// $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup SMTP servers
		// $mail->SMTPAuth = true;                               // Enable SMTP authentication
		// $mail->Username = EMAIL;                 // SMTP username
		// $mail->Password = PASS;                           // SMTP password
		// $mail->Port = 465;                                    // TCP port to connect to
		// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted


//GMAIL
         $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username =EMAIL;
    $mail->Password = PASS; // Use an App Password instead of your Google account password
    $mail->SMTPSecure = 'tls';
     $mail->Port = 587;
     //$mail->Port = 25;
    ////GMAIL


		$mail->setFrom(EMAIL, 'HoverBoard');
		$mail->addAddress($to, $nameto);               // Name is optional
		$mail->addReplyTo(EMAIL);
		foreach($cc_arr as $ccemail){
			$mail->addCC($ccemail);
		}
		

		//$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $email_body_msg;				//An HTML or plain text message body
		
				var_dump($mail);
				
				try {

  $mail->Send();
  echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}


die();
		if($mail->Send()){

	  		/*$insert_query_email = "INSERT INTO `amtr_email_loger`(`ael_mail_no`, `ael_recepient_id`, `ael_recepient_mail`, `ael_cc`, `ael_sub`, `ael_msg`, `ael_type`, `ael_ip`, `ael_browser`, `ael_os`, `ael_mac`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$insert_stmt_email = $connection->prepare($insert_query_email);           
			$insert_stmt_email->bind_param("sssssssssss", $mail_no,$recepient_id,$to,$cc,$subject,$message,$mail_type,$ip,$browser,$os,$mac);
			$insert_stmt_email->execute();*/
  		}

?>
