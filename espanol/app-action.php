<!DOCTYPE html>

<html>
<head>
    <title>Aplicaci&oacute;n - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <meta name="description" content="Formulario de aplicación para J&R Properties.">

    <style>
		table {
			margin: 0 auto;
		}
		td, th {
			padding:5px;
		}
		#PresentStAddress {
			width:600px;
		}
		th {
			border-bottom: 1px solid silver;
		}
		.break {
			border-top: 1px solid silver;
		}
	</style>
    
</head>

<body>


    <div id="body">

    <?php include 'header.php'; ?>
    
                <h1>Aplicaci&oacute;n</h1>
        <article>
                <p>Gracias por enviar su solicitud. </p>
               

            <section id="applicationform">
    			<?php
                    if (isset($_POST['submit'])){
                        
                        // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO Applications(AppDate, ApplicantFirstName, ApplicantLastName, PresentStAddress, PresentCity, PresentState, PresentZIP, Phone, Married, SpouseMonthlyIncome, SSN, PresentLandlordFirstName, PresentLandlordLastName, PresentLandlordPhone, FormerLandlordFirstName, FormerLandlordLastName, FormerLandlordPhone, CurrentEmployer, EmployerPhone, JobTitle, MonthlyIncome, PersonalReferenceName, PersonalReferencePhone, NumberofCars, NumberofPets) 
                                VALUES
                                (now(), '$_POST[ApplicantFirstName]', '$_POST[ApplicantLastName]', '$_POST[PresentStAddress]', '$_POST[PresentCity]', '$_POST[PresentState]', '$_POST[PresentZIP]', '$_POST[Phone]', '$_POST[Married]', '$_POST[SpouseMonthlyIncome]', '$_POST[SSN]', '$_POST[PresentLandlordFirstName]', '$_POST[PresentLandlordLastName]', '$_POST[PresentLandlordPhone]', '$_POST[FormerLandlordFirstName]', '$_POST[FormerLandlordLastName]', '$_POST[FormerLandlordPhone]', '$_POST[CurrentEmployer]', '$_POST[EmployerPhone]', '$_POST[JobTitle]', '$_POST[MonthlyIncome]', '$_POST[PersonalReferenceName]', '$_POST[PersonalReferencePhone]', '$_POST[NumberofCars]', '$_POST[NumberofPets]')";
                        ;
                        $retval = mysql_query( $sql, $con );
                        if(! $retval ) {
                          die('Error: ' . mysql_error());
                        }
                        echo'
                    <table>
                        <tr>
                          <td colspan="4">'.$_POST['AppDate'].'</td>
                        </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Informaci&oacute;n Personal</th>
                        </tr>
                        <tr>
                          <td><strong>Nombre del solicitante*:</strong></td>
                            <td>'.$_POST['ApplicantFirstName'].'</td>
                            <td><strong>Apellido del Solicitante*:</strong></td>
                            <td>'.$_POST['ApplicantLastName'].'</td>
                        </tr>
                        <tr>
                          <td><strong>Direcci&oacute;n Actual*:</strong></td>
                            <td colspan="3">'.$_POST['PresentStAddress'].'</td>
                        </tr>
                        <tr>
                          <td><strong>Presente Ciudad*:</strong></td>
                            <td>'.$_POST['PresentCity'].'</td>
                            <td><strong>Estado Actual*:</strong></td>
                            <td>'.$_POST['PresentState'].'</td>
                        </tr>
                        <tr>
                          <td><strong>Presente Zip-Code*:</strong></td>
                            <td>'.$_POST['PresentZIP'].'</td>
                            <td><strong>Presentar N&uacute;mero de tel&eacute;fono*:</strong></td>
                            <td>'.$_POST['Phone'].'</td>
                        </tr>
                        <tr>
                          <td><strong>¿Es usted casado?*:</strong></td>
                            <td>'.$_POST['Married'].'</td>
                            <td><strong>Ingresos Mensuales de la esposa:</strong></td>
                            <td>'.$_POST['SpouseMonthlyIncome'].'</td>
                        </tr>
                        <tr>
                          <td><strong>N&uacute;mero de Seguro Social*:</strong></td>
                            <td>'.$_POST['SSN'].'</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Informaci&oacute;n de su Residencia Actual</th>
                        </tr>
                        <tr>
                          <td><strong>Nombre de su Arrendador Actual:</strong></td>
                            <td>'.$_POST['PresentLandlordFirstName'].'</td>
                            <td><strong>Apellido de su Arrendador Actual:</strong></td>
                            <td>'.$_POST['PresentLandlordLastName'].'</td>
                        </tr>
                        <tr>
                          <td><strong>Número de tel&eacute;fono de su Arrendador Actual:</strong></td>
                            <td>'.$_POST['PresentLandlordPhone'].'</td>
                        </tr>
                        <tr>
                          <td><strong>Nombre de su Arrendador Anterior:</strong></td>
                            <td>'.$_POST['FormerLandlordFirstName'].'</td>
                            <td><strong>Apellido de su Arrendador Anterior:</strong></td>
                            <td>'.$_POST['FormerLandlordLastName'].'</td>
                        </tr>
                       <tr>
                         <td><strong>N&uacute;mero de tel&eacute;fono de su Arrendador Anterior:</strong></td>
                            <td>'.$_POST['FormerLandlordPhone'].'</td>
                      </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Informaci&oacute;n de Empleo</th>
                        </tr>
                        <tr>
                          <td><strong>Empleador Actual*:</strong></td>
                            <td>'.$_POST['CurrentEmployer'].'</td>
                            <td><strong>Tel&eacute;fono de su supervisor actual*:</strong></td>
                            <td>'.$_POST['EmployerPhone'].'</td>
                        </tr>
                        <tr>
                          <td><strong>Titulo de Trabajo *:</strong></td>
                            <td>'.$_POST['JobTitle'].'</td>
                            <td><strong>Ingreso Mensual *: $</strong></td>
                            <td>'.money_format("$%i",$_POST['MonthlyIncome']).'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Referencias</th>
                        </tr>
                        <tr>
                            <td><strong>Nombre de Referencia Personal*:</strong></td>
                            <td>'.$_POST['PersonalReferenceName'].'</td>
                            <td><strong>N&uacute;mero de tel&eacute;fono de Referencia Personal*:</strong></td>
                            <td>'.$_POST['PersonalReferencePhone'].'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Informaci&oacute;n Adicional</th>
                        </tr>
                        <tr>
                            <td><strong>N&uacute;mero de Carros*:</strong></td>
                            <td>'.$_POST['NumberofCars'].'</td>
                            <td><strong>N&uacute;mero de Mascotas*:</strong></td>
                            <td>'.$_POST['NumberofPets'].'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                    </table>';
                    }                       
                    ?>

              
            </section>
        </article>

    <?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
