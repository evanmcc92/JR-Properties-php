<!DOCTYPE html>

<html>
<head><?php 
 $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption

$dataTenantID = base64_decode($row['TenantID']);
$ivTenantID = substr($dataTenantID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedTenantID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantID),"\0");//script to decrypt
echo'
    <title>Tenant '.$decryptedTenantID.' Updated  - J&R Properties</title>';

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
                <h1>Tenant Update</h1>
        <article>

                
    <?php
    if(isset($_POST['TenantID'])){
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "select * from Tenants where TenantID = '".mysql_real_escape_string($_POST['TenantID'])."';";

                $result = mysql_query($sql,$con);
                $row = mysql_fetch_array($result);

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption

$dataTenantFirstName = base64_decode($row['TenantFirstName']);
$ivTenantFirstName = substr($dataTenantFirstName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataTenantLastName = base64_decode($row['TenantLastName']);
$ivTenantLastName = substr($dataTenantLastName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataTenantPhone = base64_decode($row['TenantPhone']);
$ivTenantPhone = substr($dataTenantPhone, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedTenantFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantFirstName),"\0");//script to decrypt
$decryptedTenantLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantLastName),"\0");//script to decrypt
$decryptedTenantPhone = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantPhone, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantPhone),"\0");//script to decrypt


$dataTenantID = base64_decode($row['TenantID']);
$ivTenantID = substr($dataTenantID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedTenantID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantID),"\0");//script to decrypt


                echo '
            <section id="tenantform">
                    <p><form action="tenant-delete.php" method="post" id="delete-tenant">
                        <input type="hidden" name="TenantID" value="'.$row['TenantID'].'">
                        <input value="Delete" type="submit" class="button">
                    </form></p>
                    <p><a href="tenant-all.php">All Tenants</a></p>
                    <form method="post" action="tenant-update-action.php">
                    	<table>
                            <tr>
                                <th colspan="2">Tenant</th>
                            </tr>
                            <tr>
                                <td><strong>Tenant ID:</strong></td>
                                <td><input name="TenantID" id="TenantID" type="text" required value="'.$row['TenantID'].'" hidden>'.$decryptedTenantID.'</td>
                            </tr>
                            <tr>
                                <td><strong>First Name:</strong></td>
                                <td><input name="TenantFirstName" id="TenantFirstName" type="text" value="'.$decryptedTenantFirstName.'"></td>
                            </tr>
                            <tr>
                                <td><strong>Last Name:</strong></td>
                                <td><input name="TenantLastName" id="TenantLastName" type="text" value="'.$decryptedTenantLastName.'"></td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number:</strong></td>
                                <td><input name="TenantPhone" id="TenantPhone" type="text" value="'.$decryptedTenantPhone.'"></td>
                            </tr>
                            <tr>
                                <td><strong>Property Type:</strong></td>
                                <td><select name="PropertyType" id="PropertyType">
  					                <option value="'.$row['PropertyType'].'">Current - '.$row['PropertyType'].'</option>
                    			    <option value="Commercial">Commercial</option>
                    			    <option value="Residential">Residential</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td><strong>Unit ID:</strong></td>
                                <td><select name="UnitID" id="UnitID">
  					<option value="'.$row['UnitID'].'">Current - '.$row['UnitID'].'</option>';
                    	$sql2 = "SELECT UnitID FROM ResidentialUnits UNION All SELECT UnitID FROM CommercialUnits Order by UnitID";
                        $result2 = mysql_query($sql2,$con);


                        while($row2 = mysql_fetch_array($result2)){
$dataUnitID = base64_decode($row2['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt


                            echo                '<option value="'.$row2['UnitID'].'">'.$decryptedUnitID.'</option>';
                      
                          }
                    		echo '</select></td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Rent:</strong></td>
                                <td><input name="MonthlyRent" id="MonthlyRent" type="text" value="'.$row['MonthlyRent'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Lease Start:</strong></td>
                                <td><input name="LeaseStart" id="LeaseStart" type="text" value="'.$row['LeaseStart'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Lease End:</strong></td>
                                <td><input name="LeaseEnd" id="LeaseEnd" type="text" value="'.$row['LeaseEnd'].'"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" class="button"></form></td>
                                <td>
                                </td>
                            </tr>
                        </table>
              
            </section>';
        }
        ?>
        </article>

		<?php include "footer.php"; ?>

  
    </div> 

</body>
</html>
