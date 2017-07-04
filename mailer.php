<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = strip_tags(trim($_POST["name"]));
		$name = str_replace(array("\r","\n"),array(" "," "),$name);
		$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
		$message = nl2br($_POST["message"]);
		if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// Set a 400 (bad request) response code and exit.
			http_response_code(400);
			echo 'Oops! There was a problem with your submission. Please complete the form and try again.';
			exit;
		}
		$recipient = "mark@prydonian.digital";
		$subject = "[BedNBreakfasttt] new message from $name";
		$email_content = $message . '<p><img src="http://bnb.co.uk.gridhosted.co.uk/wp-content/themes/bed-n-breakfasttt/img/bnb.png"></p>';

		$headers = "From: " . $name . "<" . $email . ">" . "\r\n";
		$headers .= "Reply-To: ". $email . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$email_headers = "From: $name <$email>";
		$email_headers .= 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
		if (mail($recipient, $subject, $email_content, $headers)) {
			http_response_code(200);
			echo 'Thank You! Your message has been sent.';
		} else {
			http_response_code(500);
			echo 'Oops! Something went wrong and we couldn\'t send your message.';
		}
	} else {
		http_response_code(403);
		echo 'There was a problem with your submission, please try again.';
	}
?>