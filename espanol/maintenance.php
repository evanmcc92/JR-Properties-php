<!DOCTYPE html>

<html>
<head>
    <title>Maintenance - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

    
</head>

<body>
<?php
                    if (isset($_POST['submit'])){

                        if(empty($_POST['Plumbing'])){
                            $Plumbing = "No";
                        } else {
                            $Plumbing = "Yes";
                        }

                        if(empty($_POST['Electric'])){
                            $Electric = "No";
                        } else {
                            $Electric = "Yes";
                        }

                        if(empty($_POST['Other'])){
                            $Other = "No";
                        } else {
                            $Other = "Yes";
                        }
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO MaintenanceTickets (IssueDate, TenantFirstName, TenantLastName, UnitID, Plumbing, Electric, Other, Description, Resolved)
                                VALUES
                                (now(), '$_POST[TenantFirstName]','$_POST[TenantLastName]','$_POST[UnitID]','$Plumbing','$Electric','$Other','$_POST[Description], 'No'')";
                        ;
                        $retval = mysql_query( $sql, $con );
                        if(! $retval ) {
                          die('Error: ' . mysql_error());
                        }
                        echo'<script>alert("Le pedimos disculpas por la inconveniencia relacionada al mantenimiento de una de nuestras propierdades. Nosotros procesaremos su solicitud tan pronto como sea posible. Para actualizaciones relacionadas a su solicitud de servicio, por favor llame al (781) 974-5790.");</script>';
                    }                       
                    ?>
    <div id="body">

<?php include 'header.php'; ?>
<h1>Mantenimiento</h1>
    
        <article>
                <p>Lamentamos o&iacute;r que usted est&aacute; experimentando inconvenientes con su unidad. Por favor complete el siguiente formulario con su nombre, tel&eacute;fono y descripci&oacute;n del problema. Al enviar el formulario, nuestro equipo  comenzar&aacute; a resolver el problema de la mejor manera posible.</p>

            <section id="maintenanceform">
                <form method="POST" action="<?php $_PHP_SELF ?>">
                    <p>Nombre: <input name="TenantFirstName" id="TenantFirstName" size="50" Required="YES" Message="Please enter First Name."></p>
                    <p>Apellido: <input name="TenantLastName" id="TenantLastName" size="50" Required="YES" Message="Please enter Last Name."></p>
                    <p><select name="UnitID" id="UnitID">
  					         <option>Seleccione su Unidad</option>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno())
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT UnitID FROM ResidentialUnits UNION ALL SELECT UnitID FROM CommercialUnits ORDER BY UnitID";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<option value="'.$row['UnitID'].'">'.$row['UnitID'].'</option>';
                      
                          }
                                            
                        ?>
                    </select>
                    </p>
                    <p><input type="checkbox" name="Plumbing" value="Y">
                      Agua y sanitarios
                      <input type="checkbox" name="Electric" value="Y">
                      Electricidad  
                      <input type="checkbox" name="Other" value="Y">
                      Otros</p>
                    <p>Descripci&oacute;n:<br>
                       <textarea name="description" id="description" cols="43" rows="5" placeholder="Enter comments here."></textarea></p>
                    <p><input type="submit" value="Enviar" class="button"> <input type="reset" value="Reiniciar" class="button"></p> 
                </form>
                
                
        </article>
        
<?php include 'footer.php'; ?>

    </div>

</body>
</html>
