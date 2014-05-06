<!DOCTYPE html>

<html>
<head>
    <title>Contact Us - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <meta name="description" content="Información de contacto para J&R Properties">
    <style type="text/css">

    #maps {
        text-align: center;
    }

    </style>
    
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
$body = "Message from: ".$name."\n\nReturn Email: ".$email."\n\nMessage:\n".$message; //body of email
$emailto = "jandrpropertyrentals@gmail.com"; //everyones email to send to

echo '<script type="text/javascript">alert("Gracias '.$name.' para el env&iacute;o de un correo electr&oacute;nico, espera escuchar algo pronto.");</script>';
mail($emailto, 'Contact Form Message J&R Properties', $body, 'From: '.$email);
}
}


?>

<!--end email form-->
    <div id="body">

    <?php include 'header.php'; ?>
            <h1>Cont&aacute;ctenos</h1>
    
      <article>
            <p>Nuestra oficina principal est&aacute; ubicada en 52R Green Street Lynn, MA. Puede ponerse en contacto con nosotros por tel&eacute;fono, por favor llame al (781) 974-5790.</p>
            <p>&nbsp;</p>
            <p id="maps"><iframe width="600" height="450" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=52R%20Green%20Street%20Lynn%2C%20MA%2002194&key=AIzaSyD-jE5-LQVhNq2pvw09RZSAaFUT5O6V0pk"></iframe></p>
            <p>&nbsp;</p>
            <p>No dude en rellenar el siguiente formulario para cualquier consulta generales que pueda tener.</p>
            <section id="emailform">
                <form method="POST" action="contact.php" onSubmit="completeAlert()">
                    <p>Email: <input name="email" id="email" size="50" Required="Yes" Message="Entre su email aqui."></p>
                    <p>Nombre: <input name="name" id="name" size="50" Required="YES" Message="Entre su nombre aqui."></p>
                    <p>Mensaje:<br>
                       <textarea name="message" id="message" cols="43" rows="5" placeholder="Entre su mensaje aqui."></textarea></p>
                    <p><input type="submit" value="Enviar"> <input type="reset" value="Reiniciar"></p> 
                </form>
            </section>
      </article>
<?php include 'footer.php'; ?>
        
        

    </div>

</body>
</html>