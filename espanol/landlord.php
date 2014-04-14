<!DOCTYPE html>

<html>
<head>
    <title>Landlord - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
<meta name="description" content="J&R Propiedades tiene el compromiso de administrar todos sus detalles asociados con el mantenimiento y la gestión.">

    
</head>

<body>
<!-- email form -->

<!--if the forms email field is filled out-->
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

echo '<script type="text/javascript">alert("Gracias '.$name.' para el envío de un correo electrónico, espera escuchar algo pronto.");</script>';
mail($emailto, 'Landlord Message J&R Properties', $body, 'From: $email');
}
}


?>

<!--end email form-->
    <div id="body">

    <?php include 'header.php'; ?>
      <h1>Se&ntilde;or Propietario</h1>
    
        <article>
            <section id="landlord-text">
                <p>J & R Propiedades tiene el compromiso de administrar todos sus detalles asociados con el mantenimiento y la gesti&oacute;n. Ofrecemos los siguientes servicios:</p>
    
                <p>Gesti&oacute;n de Propiedades:</p>
<ul><li>Colecciones de renta</li>
  <li> Pagos de gastos</li>
  <li> Fomentar las relaciones profesionales con los inquilinos</li>
  <li> Renovaci&oacute;n y ampliaci&oacute;n de los arrendamientos</li>
  <li> Antecedentes y chequeo de cr&eacute;dito de los solicitantes</li>
  <li> Cumplir con las leyes y regulaciones locales,estatales y federales</li>
        </ul>
                <p>Mantenimiento:</p>
                <ul>
                  <li>Identificaci&oacute;n de problemas y resoluci&oacute;n oportuna de los mismos.</li>
                    <li> Servicios de plomer&iacute;a, electricidad y carpinter&iacute;a.</li>
                    <li> Inspecci&oacute;n de las propiedades con frecuencia.</li>
                    <li> Ofrecer un servicio amigable.</li>
                </ul>
                <p>&nbsp;</p>
                <p>Interesados en un gerente inmobiliario? Cont&aacute;ctanos aqu&iacute; para concertar una reuni&oacute;n.</p>
            </section>

            <section id="emailform">
                <form method="POST" action="landlord.php">
                    <p>Email: <input name="email" id="email" size="50" Required="Yes" Message="Entre su email aqui."></p>
                    <p>Nombre: <input name="name" id="name" size="50" Required="YES" Message="Entre su nombre aqui."></p>
                    <p>Mensaje:<br>
                       <textarea name="message" id="message" cols="43" rows="5" placeholder="Entre su mensaje aqui."></textarea></p>
                    <p><input type="submit" value="Enviar" class="button"> <input type="reset" value="Reiniciar" class="button"></p> 
                </form>
            </section>
        </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
