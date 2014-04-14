<!DOCTYPE html>

<html>
<head>
    <?php
        echo '<title>Tenant '.$_POST['TenantID'].' Updated - J&R Properties</title>';
    ?>
    
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

    <style>
		#navbar li {
			list-style-type: none;
			display: block;
			padding: 5px 10px;
			float:left;
		}
		table {
			margin: 0 auto;
			width:75%;
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

    <?php include "header.php"; ?>
                <h1>Tenant Updated</h1>
    
        <article>
            <h3>Tenant Has Been Updated</h3>
            <p><a href="tenant-all.php">All Tenants</a></p>
            <section id="tenantform">              	
            	<?php
                    if(isset($_POST['TenantID'])){
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "UPDATE Tenants 
                        SET TenantID = '$_POST[TenantID]', TenantFirstName = '$_POST[TenantFirstName]', TenantLastName = '$_POST[TenantLastName]', TenantPhone = '$_POST[TenantPhone]', PropertyType = '$_POST[PropertyType]', UnitID = '$_POST[UnitID]', MonthlyRent = '$_POST[MonthlyRent]', LeaseStart = '$_POST[LeaseStart]', LeaseEnd = '$_POST[LeaseEnd]'
                        WHERE TenantID = '$_POST[TenantID]'";

                        $result = mysql_query($sql,$con);
            
                        echo '
    			            <table>
                                <tr>
                                    <th colspan="2">Tenant</th>
                                </tr>
                                <tr>
                                    <td><strong>Tenant ID:</strong></td>
                                    <td>'.$_POST['TenantID'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>First Name:</strong></td>
                                    <td>'.$_POST['TenantFirstName'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Last Name:</strong></td>
                                    <td>'.$_POST['TenantLastName'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone Number:</strong></td>
                                    <td>'.$_POST['TenantPhone'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Property Type:</strong></td>
                                    <td>'.$_POST['PropertyType'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Unit ID:</strong></td>
                                    <td>'.$_POST['UnitID'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Monthly Rent:</strong></td>
                                    <td>'.$_POST['MonthlyRent'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Lease Start:</strong></td>
                                    <td>'.$_POST['LeaseStart'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Lease End:</strong></td>
                                    <td>'.$_POST['LeaseEnd'].'</td>
                                </tr>
                        		<tr>
                            		<td colspan="2" class="break">&nbsp;</td>
                                </tr>
                            </table>';
                    }
                ?>
              
            </section>
        </article>

    <?php include "footer.php"; ?>

  
    </div> 

</body>
</html>
