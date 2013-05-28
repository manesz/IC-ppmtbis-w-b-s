<?php


	function send_email($to, $subject, $name, $msg, $e, $error){
		
		$headers = "From: " . $e . "\r\n";
		$headers .= "Reply-To: ". $e . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$msg_final = "";
				
		$msg_final = "<b>Name:</b> ".$name."<br><br>".$msg;
		
		if(mail($to, $subject, $msg_final, $headers)){
			return true;
		} else {
			return false;
		}
	}
	
?>