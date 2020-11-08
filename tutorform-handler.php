<?php   
 	// ** Form validation code **
 	// We will use the $_POST "super global" associative array to extract the values of the form fields
	// #1 - was the submit button pressed?
    if (isset($_POST["submit"])){ 
    	$to = "Lucillecl@gmail.com"; // !!! REPLACE WITH YOUR EMAIL !!!
    	
    	// #2 - if a value for the `email` form field is missing, give a default value
    	// else, use the value from the form field
	$from = empty(trim($_POST["email"])) ? "noemail@sample.com" : sanitize_string($_POST["email"]);
			
	$subject = "Educate 360 Request Form";
			
	// #4 - same as above, except with the `name` form field
	$first_name = empty(trim($_POST["first_name"])) ? "No name" : sanitize_string($_POST["first_name"]);
	
	$last_name = empty(trim($_POST["last_name"])) ? "No name" : sanitize_string($_POST["last_name"]);
	
	/*$subject_array = array();
	
	if(!empty($_POST['subject_field'])) {
		foreach(sanitize_string($_POST['subject_field']) as $check) {
				array_push($subject_array, $check); 
		}
	}*/
	
	$subject_field = empty(trim($_POST["subject_field"])) ? "No subject" : sanitize_string($_POST["subject_field"]);
	
	$tutor_field = empty(trim($_POST["tutor_field"])) ?  "No tutors" : sanitize_string($_POST["tutor_field"]);
	
	$comm_field = empty(trim($_POST["comm_field"])) ? "No preferred communication method" : sanitize_string($_POST["comm_field"]);
	
	$time_field = empty(trim($_POST["time_field"])) ?  "No time" : sanitize_string($_POST["time_field"]);
	
	// #3 - same as above, except with the `message` form field
	$comment_field = empty(trim($_POST["comment_field"])) ?  "No comments" : sanitize_string($_POST["comment_field"]);
			
	// #5 - same as above, except with the `human` form field
	$human = empty(trim($_POST["human"])) ? "0" : sanitize_string($_POST["human"]);
			
	$headers = "From: $from" . "\r\n";
			
	// #6 - add the user's name to the end of the message
	$message .= "Subject: $subject_field\nPreferred Tutor(s): $tutor_field\nCommunication Method: $comm_field\nTimes: $time_field\nAdditional Comments: $comment_field\n\n - $first_name $last_name";
		
	// #7 - if they know what 2+2 is, send the message
	//if (intval($human) == 4){
			
		// #8 - mail returns false if the mail can't be sent
		$sent = mail($to,$subject,$message,$headers);
		foreach($subject_array as &$value){
			mail($value);
		}
		// if ($sent){
// 					echo "<p><b>You sent:</b> $message</p>";
// 		}else{
// 					echo "<p>Mail not sent!</p>";
// 		}
	//}else{
				// echo "<p>You are either a 'bot, or bad at arithmetic!</p>";
	//}
    }
    
    // go back to form page when we are done
	header("Location: tutors.html"); // #10 - CHANGE THIS TO THE NAME OF YOUR FORM PAGE - AN ABSOLUTE URL WOULD BE EVEN BETTER
	exit();
    
    // #9 - this handy helper function is very necessary whenever
    // we are going to put user input onto a web page or a database
    // For example, if the user entered a <script> tag, and we added that <script> tag to our HTML page
    // they could perform an XSS attack (Cross-site scripting)
    function sanitize_string($string){
	$string = trim($string);
	$string = strip_tags($string);
	return $string;
    }
?>