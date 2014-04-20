<!DOCTYPE html>

<html>
<head>
    <title>Landlord - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="description" content="J&R Properties is committed property management and maintenance. Services provided include rent collection, expense payments, property inspections and more.">

    
</head>

<body>
<!-- email form -->
	<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$problem = FALSE;

if (empty($_POST['name'])) { //verify that name is filled out
$problem = TRUE;
echo "<script type='text/javascript'>alert('Name must be filled out');</script>";
}
if (empty($_POST['email']) || (substr_count($_POST['email'], '@') != 1) ) {//verify that email is filled out and there is at least one @ in email address
$problem = TRUE;
echo "<script type='text/javascript'>alert('Please provide a valid email address');</script>";
}
if (empty($_POST['message'])) { //verify that message is filled out
$problem = TRUE;
echo "<script type='text/javascript'>alert('Message must be filled out');</script>";
}

if (!$problem) {
$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];
$body = "Message from: $name\n\nReturn Email: $email\n\nMessage:\n$message"; //body of email
$emailto = "webmaster@evanamccullough.com"; //everyones email to send to

echo '<script type="text/javascript">alert("Thank you '.$name.' for sending an email, expect to hear something soon.");</script>';
mail($emailto, 'Landlord Message J&R Properties', $body, 'From: $email');
}
}


?>

<!--end email form-->
    <div id="body">

    <?php include 'header.php'; ?>
                <h1>Landlord</h1>
    
        <article>
            <section id="landlord-text">
                <p>J&R Properties is committed to administrating all particulars associated with maintenance and management. We provide the following services:</p>
    
                <p>Property Management:</p>
        <ul>
            <li>Rent collections</li>
            <li>Expense payments</li>
            <li>Fostering professional relationships with tenants</li>
            <li>Renewal and extension of leases</li>
            <li>Background and credit checks of applicants</li>
            <li>Compliant with local, state and federal laws and regulations</li>
        </ul>
                <p>Maintenance:</p>
                <ul>
                    <li>Timely problem identification and resolution.</li>
                    <li>Plumbing, electric and carpentry services.</li>
                    <li>Frequent property inspections.</li>
                    <li>Friendly service.</li>
                </ul>
                <p>&nbsp;</p>
                <p>Interested in a property manager? Contact us here to set up a meeting.</p>
            </section>

            <section id="emailform">
                <form method="POST" action="landlord.php">
                    <p>Email: <input name="email" id="email" size="50" Required="Yes" Message="Please enter email."></p>
                    <p>Name: <input name="name" id="name" size="50" Required="YES" Message="Please enter Complete Name."></p>
                    <p>Message:<br>
                       <textarea name="message" id="message" cols="43" rows="5" placeholder="Enter message here."></textarea></p>
                    <p><input type="submit" value="Submit"  class="button"> <input type="reset" value="Reset"  class="button"></p> 
                </form>
            </section>
        </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
