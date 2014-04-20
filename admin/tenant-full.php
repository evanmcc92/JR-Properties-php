<!DOCTYPE html>

<html>
<head>
    <title>Tenant - J&R Properties</title>
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
			width: 75%;
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
	</style>
    
</head>

<body>


    <div id="body">

    <?php include "header.php"; ?>
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
$dataUnitID = base64_decode($row['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedTenantFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantFirstName),"\0");//script to decrypt
$decryptedTenantLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantLastName),"\0");//script to decrypt
$decryptedTenantPhone = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantPhone, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantPhone),"\0");//script to decrypt
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt

                echo '<h1>Tenant '.$row['TenantID'].'</h1>

            <section id="applicationform">
                	<p><form action="tenant-delete.php" method="post" id="delete-ticket">
                        <input type="hidden" name="TenantID" value="'.$row['TenantID'].'">
                        <input value="Delete" type="submit" class="button">
                	</form></p>
                	<p><form action="tenant-update.php" method="post">
                        <input type="hidden" name="TenantID" value="'.$row['TenantID'].'">
                        <input value="Edit" type="submit" class="button">
                    </form></p>
                    <p><a href="tenant-all.php">All Tenants</a></p>
                    <p>&nbsp;</p>
                
                    <table id="'.$row['TenantID'].'">
                        <tr>
                                <th colspan="4">Tenant '.$row['TenantID'].'</th>
                        </tr>
                        <tr>
                            <td><b>First Name:</b></td>
                            <td>'.$decryptedTenantFirstName.'</td>
                            <td><strong>Last Name:</strong></td>
                            <td>'.$decryptedTenantLastName.'</td>
                        </tr>
                        <tr>
                            <td><strong>Phone Number:</strong></td>
                            <td>'.$decryptedTenantPhone.'</td>
                            <td><strong>Unit ID:</strong></td>
                            <td>'.$decryptedUnitID.'</td>
                        </tr>
                        <tr>
                            <td><b>Monthly Rent:</b></td>
                            <td>'.money_format("$%i",$row['MonthlyRent']).'</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                                <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>Lease Start:</b></td>
                            <td>'.$row['LeaseStart'].'</td>
                            <td><b>Lease End:</b></td>
                            <td>'.$row['LeaseEnd'].'</td>
                        </tr>
                        <tr>
                             <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                  </table>
                    </section>';
                mysql_close($con);
    } 
            ?>
        </article>
    <?php include "footer.php"; ?>

  
    </div>

</body>
</html>
