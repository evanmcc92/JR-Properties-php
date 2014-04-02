<?php
if (!isset($_SESSION)) { 
	session_start(); 
	header( 'Location: index.php' );
	die();
} else {
	header( 'Location: login.php' );
	die();
}

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
	</style>
</head>

<body>
<?php
 
$username = 'username';
$password = 'password';

$inputusername = $_POST['username'];
$inputpassword = $_POST['password'];

if ($username == $inputusername && $password == $inputpassword){
	$_SESSION['LoggedIn'] = true;
	echo "<script>alert('Welcome Back ".username.".');</script>";
	header( 'Location: index.php' );
	die();
} else {
	$_SESSION['LoggedIn'] = false;
	die ("User / Password is Incorrect");
}
?>
    <div id="body">
    	<?php include "header.php"; ?>
		<h1>Login</h1>
        <article>

        	<form action="login.php" method="post">
        		<p>Username: <input type="text" name="username" required /></p>
            	<p>Password:  <input type="password" name="password" required /></p>
                <p class="centerp"><input type="submit" value="Submit" class="button"/> | <input type="reset" value="Reset" class="button"/></p>
            </form>
        </article>
        <p class="centerp">Lost? <a href="../index.php">Click here to go back to the public site</a></p>
    	<?php include "footer.php"; ?>
	</div>
</body>
</html>