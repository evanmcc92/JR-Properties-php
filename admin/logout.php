<?php 

	$past = time() - 100; 

	//this makes the time in the past to destroy the cookie 

	setcookie(A2BrYce7cQy2rqxSQv58, gone, $past); 

	setcookie(uvvULDuCBDNvD6CHY7tl, gone, $past); 

	header("Location: login.php"); 
?>