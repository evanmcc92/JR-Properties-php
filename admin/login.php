<?php
// Connects to your Database 

	$con = mysql_connect('127.0.0.1:33067','root','');

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$db_selected = mysql_select_db("jrproper_jrproperties",$con);


	//Checks if there is a login cookie

	if(isset($_COOKIE['A2BrYce7cQy2rqxSQv58']))


		//if there is, it logs you in and directes you to the members page

		{ 
		$username = $_COOKIE['A2BrYce7cQy2rqxSQv58']; 

		$pass = $_COOKIE['uvvULDuCBDNvD6CHY7tl'];

		$check = mysql_query("SELECT * FROM User WHERE username = '$username';")or die(mysql_error());

		while($info = mysql_fetch_array( $check )){

			if ($pass != $info['password']){

			}else{

				header("Location: index.php");

			}

		}

	}


	//if the login form is submitted 

	if (isset($_POST['submit'])) { // if form has been submitted



		// makes sure they filled it in

		if(!$_POST['username'] | !$_POST['password']) {

			die('<script>alert("You did not fill in a required field.");</script>');

		}

		// checks it against the database



		if (!get_magic_quotes_gpc()) {

			$_POST['email'] = addslashes($_POST['email']);

		}

		$check = mysql_query("SELECT * FROM User WHERE username = '".$_POST['username']."';")or die(mysql_error());



		//Gives error if user dosen't exist

		$check2 = mysql_num_rows($check);

		if ($check2 == 0) {

			die('That user does not exist in our database. Please contact site administrator.');

		}

		while($info = mysql_fetch_array( $check )) {

			$_POST['password'] = stripslashes($_POST['password']);

			$info['password'] = stripslashes($info['password']);



			//gives error if the password is wrong

			if ($_POST['password'] != $info['password']) {

				die('Incorrect password, please try again.');

			} else { 


				// if login is ok then we add a cookie 

				$_POST['username'] = stripslashes($_POST['username']); 

				$hour = time() + 3600; 

				setcookie(A2BrYce7cQy2rqxSQv58, $_POST['username'], $hour); 

				setcookie(uvvULDuCBDNvD6CHY7tl, $_POST['password'], $hour);	 



				//then redirect them to the members area 

				header("Location: index.php"); 

			} 

		} 

	} else {	 
	// if they are not logged in 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <style>
		article{
			margin: 0 auto;
			width: 25%;
		}
		.centerp {
			text-align:center;
		}
		#navbar li {
			list-style-type: none;
			display: block;
            padding: 5px 10px;
			float:left;
		}
	</style>
</head>

<body>
    <div id="body">
    	<?php include "header.php"; ?>
		<h1>Login</h1>
        <article>

        	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        		<p>Username: <input type="text" name="username"  /></p>
            	<p>Password:  <input type="password" name="password"  /></p>
                <p class="centerp"><input type="submit" value="Submit" name="submit" class="button"/> | <input type="reset" value="Reset" class="button"/></p>
            </form>
        </article>
        <p class="centerp">Lost? <a href="../index.php">Click here to go back to the public site</a></p>
    	<?php include "footer.php"; ?>
	</div>
</body>
</html>
<?php 

	}  

?>
