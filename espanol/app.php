<!DOCTYPE html>

<html>
<head>
    <title>Application - J&R Properties</title>
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
                <p>Si usted desea alquilar una unidad dentro de nuestras  propiedades residenciales, por favor complete la solicitud, o imprima y envie  por correo <a href="../application.pdf">este formulario</a>. Al terminar, nosotros vamos a mantenernos en  contacto y programar una visita a nuestras propiedades que se encuentren  disponibles. Si usted es propietario de un negocio y est&aacute interesado en el  alquiler de un local comercial, por favor contactenos directamente al email: <a href="mailto:email@example.com">email@example.com</a> para consultas generales de nuestras propiedad.</p>
<section id="applicationform">
      <form method="post" action="app-action.php" >
            <table>
                <tr>
                  <td colspan="4">
                    <input name="AppDate" id="AppDate" type="hidden" value="<?php echo date("m/d/Y");?>"></td>
                </tr>
                <tr>
                  <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                        <th colspan="4">Informaci&oacute;n Personal</th>
                </tr>
                <tr>
                    <td><strong>Nombre del solicitante*:</strong></td>
                    <td><input name="ApplicantFirstName" id="ApplicantFirstName" required  ></td>
                    <td><strong>Apellido del Solicitante*:</strong></td>
                    <td><input name="ApplicantLastName" id="ApplicantLastName" required  ></td>
                </tr>
                <tr>
                    <td><strong>Direcci&oacute;n Actual*:</strong></td>
                    <td colspan="3"><input name="PresentStAddress" id="PresentStAddress" required  ></td>
                </tr>
                <tr>
                    <td><strong>Presente Ciudad*:</strong></td>
                    <td><input name="PresentCity" id="PresentCity" required  ></td>
                    <td><strong>Estado Actual*:</strong></td>
                    <td><select name="PresentState"  required  >
                        <option>Seleccione un Estado</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select></td>
                <tr>
                <tr>
                    <td><strong>Presente Zip-Code*:</strong></td>
                    <td><input name="PresentZIP" id="PresentZIP" required  ></td>
                    <td><strong>Presentar N&uacute;mero de tel&eacute;fono*:</strong></td>
                    <td><input name="Phone" id="Phone" required  ></td>
                <tr>
                <tr>
                    <td><strong>¿Es usted casado?*:</strong></td>
                    <td><input name="Married" type="radio" value="Y" required>S&iacute; <input name="Married" type="radio" value="N"required>No</td>
                    <td><strong>Ingresos Mensuales de la esposa:</strong></td>
                    <td><input name="SpouseMonthlyIncome" id="SpouseMonthlyIncome" ></td>
                </tr>
                <tr>
                    <td><strong>N&uacute;mero de Seguro Social*:</strong></td>
                    <td><input name="SSN" id="SSN"required type="password" ></td>
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
                    <td><input name="PresentLandlordFirstName" id="PresentLandlordFirstName"></td>
                    <td><strong>Apellido de su Arrendador Actual:</strong></td>
                    <td><input name="PresentLandlordLastName" id="PresentLandlordLastName"  ></td>
                <tr>
                <tr>
                    <td><strong>Número de tel&eacute;fono de su Arrendador Actual:</strong></td>
                    <td><input name="PresentLandlordPhone" id="PresentLandlordPhone"  ></td>
                </tr>
                <tr>
                    <td><strong>Nombre de su Arrendador Anterior:</strong></td>
                    <td><input name="FormerLandlordFirstName" id="FormerLandlordFirstName" ></td>
                    <td><strong>Apellido de su Arrendador Anterior:</strong></td>
                    <td><input name="FormerLandlordLastName" id="FormerLandlordLastName" ></td>
                <tr>
               <tr>
                    <td><strong>N&uacute;mero de tel&eacute;fono de su Arrendador Anterior:</strong></td>
                    <td><input name="FormerLandlordPhone" id="FormerLandlordPhone"></td>
              </tr>
                <tr>
                        <td colspan="4" class="break">&nbsp;</td>
                </tr>
                <tr>
                        <th colspan="4">Informaci&oacute;n de Empleo</th>
                </tr>
                <tr>
                    <td><strong>Empleador Actual*:</strong></td>
                    <td><input name="CurrentEmployer" id="CurrentEmployer" required  ></td>
                        <td><strong>Tel&eacute;fono de su supervisor actual*:</strong></td>
                    <td><input name="EmployerPhone" id="EmployerPhone"  required ></td>
                </tr>
                <tr>
                    <td><strong>Titulo de Trabajo *:</strong></td>
                    <td><input name="JobTitle" id="JobTitle" required  ></td>
                        <td><strong>Ingreso Mensual *: $</strong></td>
                    <td>
                      <input name="MonthlyIncome" id="MonthlyIncome" required  type="number" ></td>
                </tr>
                <tr>
                        <td colspan="4" class="break">&nbsp;</td>
                </tr>
                <tr>
                        <th colspan="4">Referencias</th>
                </tr>
                <tr>
                    <td><strong>Nombre de Referencia Personal*:</strong></td>
                    <td><input name="PersonalReferenceName" id="PersonalReferenceName" required  ></td>
                        <td><strong>N&uacute;mero de tel&eacute;fono de Referencia Personal*:</strong></td>
                    <td><input name="PersonalReferencePhone" id="PersonalReferencePhone" required  ></td>
                </tr>
                <tr>
                        <td colspan="4" class="break">&nbsp;</td>
                </tr>
                <tr>
                        <th colspan="4">Informaci&oacute;n Adicional</th>
                </tr>
                <tr>
                    <td><strong>N&uacute;mero de Carros*:</strong></td>
                    <td><select name="NumberofCars"  required  >
                            <?php 
                              for ($x=0; $x<=5; $x++)
                                 {
                                 echo "<option value='$x'>$x</option>";
                                 }
                            ?> 
                        </select>
                    </td>
                    <td><strong>N&uacute;mero de Mascotas*:</strong></td>
                    <td><select name="NumberofPets"  required  >
                            <?php 
                              for ($x=0; $x<=5; $x++)
                                 {
                                 echo "<option value='$x'>$x</option>";
                                 }
                            ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                        <td colspan="4" class="break">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Enviar" class="button"></td>
                    <td colspan="2"><input type="reset" value="Reiniciar" class="button"></td>
                </tr>
            </table>

      </form>
              
                
      </section>
        </article>
    <?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
