<!DOCTYPE html>

<html>
<head>
    <title>Tenant Added - J&R Properties</title>
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
                <h1>Tenant</h1>
    
        <article>
            <h3>Tenant Added</h3>
            <p><a href="tenant-all.php">All Tenants</a></p>
 
            <section id="tenantform">
            <?php
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM); //used to add more randomness to the encryption process


$encryptedTenantFirstName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['TenantFirstName'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedTenantLastName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['TenantLastName'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedTenantPhone = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['TenantPhone'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedUnitID = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['UnitID'],MCRYPT_MODE_CBC,$iv)); //script to encrypt

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "INSERT INTO Tenants(TenantID, TenantFirstName,TenantLastName,TenantPhone,PropertyType,UnitID,MonthlyRent, LeaseStart, LeaseEnd)
                VALUES ('$_POST[TenantID]', '$encryptedTenantFirstName', '$encryptedTenantLastName', '$encryptedTenantPhone', '$_POST[PropertyType]', '$encryptedUnitID', '$_POST[MonthlyRent]', '$_POST[LeaseStart]', '$_POST[LeaseEnd]')";

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
            ?>
                    
              
            </section>
        </article>


    <?php include "footer.php"; ?>

  
    </div> 

</body>
</html>
