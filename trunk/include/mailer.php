<?

function send_mail($template, $email, $subj, $body_txt = NULL, $body_html = NULL, $name = NULL) {
	global $smarty;
	
	require_once ("./mailscript/class.phpmailer.php");

	$body_html = $smarty->fetch(ROOT_PATH.'templates/mail/'.$template.".tpl");

	$mail = new PHPMailer();
	
	$mail->IsSMTP();                                      // set mailer to use SMTP
//	$mail->Host = "87.118.118.137";  // specify main and backup server
     	$mail->Host = "localhost";
	//~ $mail->SMTPAuth = false;     // turn on SMTP authentication
//	$mail->Username = "gan";  // SMTP username
//	$mail->Password = "Hj4asCzxQWA"; // SMTP password
	$mail->CharSet = "windows-1251";

	$mail->From = "support@webkamer.net";
	$mail->FromName = $subj;
	$mail->AddAddress($email, $name);

	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = $subj;
	$mail->Body    = $body_html;
	$mail->AltBody = $body_txt;
    $r = $mail->Send();

	if (!$r) {
	   echo "<b>Message could not be sent.</b> <p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
//	   exit;
	}	
	
	return $r;
}
