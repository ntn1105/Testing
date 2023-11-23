<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    // Load Composer's autoloader
    require "autoload.php";

    class PhpMail
    {
        public static function send_email($from_address, $from_name,$to_address, $to_name, $subject, $body, $is_body_html = true) {
		if (!self::valid_email($to_address)) {
			throw new Exception('This To address is invalid: ' .
								htmlspecialchars($to_address));
		}
		if (!self::valid_email($from_address)) {
			throw new Exception('This From address is invalid: ' .
								htmlspecialchars($from_address));
		}

		$mail = new PHPMailer();
		// **** You must change the following to match your
		// **** SMTP server and account information.    
		$mail->isSMTP();                             // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';              // Set SMTP server
		$mail->SMTPSecure = 'tls';                   // Set encryption type
		$mail->Port = 587;                           // Set TCP port
		$mail->SMTPAuth = true;                      // Enable SMTP authentication
		$mail->Username = 'cojhoang44@gmail.com'; // Set SMTP username
		$mail->Password = 'tinhnhat';           // Set SMTP password
        // $key = ""; 
        // $hash = "";
        // $mail->Password = DeCrypt::decrypt($hash,$key);
		
		// Set From address, To address, subject, and body
		$mail->setFrom($from_address, $from_name);
		$mail->addAddress($to_address, $to_name);
        // $mail->addAddress('ellen@example.com'); // Name is optional
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

		//Content
		$mail->Subject = $subject;
		$mail->Body = $body;                  // Body with HTML
		$mail->AltBody = strip_tags($body);   // Body without HTML
        $mail->CharSet = 'utf-8';
		if ($is_body_html) {
			$mail->isHTML(true);              // Enable HTML
		}
		
		if(!$mail->send()) {
			throw new Exception('Error sending email: ' .htmlspecialchars($mail->ErrorInfo) );        
		}    
		else 
		    return true;
	}

	public static function valid_email($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			return false;
		} else {
			return true;
		}
	}
    }
?>