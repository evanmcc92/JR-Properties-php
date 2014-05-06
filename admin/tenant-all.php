<!DOCTYPE html>

<html>
<head>
    <title>All Tentants - Admin - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">
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
    
        <?php
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM Tenants";

                $result = mysql_query($sql,$con);
                
                $num_rows = mysql_num_rows($result);


                echo' <h1>Tenants</h1>
            <h3>Total Number of Tenants: '.$num_rows.'</h3>
            <h3><a href="tenant-add.php">Add New Tenant</a></h3>
            
            <table>
            	<tr>
                	<th colspan="7">Tenants</th>
                </tr>
                <tr>
                	<th>Tenant ID</th>
                	<th>First Name</th>
                	<th>Last Name</th>
                	<th>Phone Number</th>
                	<th colspan="2">Options</th>
                </tr>';

while($row = mysql_fetch_array($result)){
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

                echo'
                <tr>
                	<td>'.$row['TenantID'].'</td>
                	<td>'.$decryptedTenantFirstName.'</td>
                	<td>'.$decryptedTenantLastName.'</td>
                	<td>'.$decryptedTenantPhone.'</td>
                	<td><form action="tenant-full.php" method="post">
                        <input type="hidden" name="TenantID" value="'.$row['TenantID'].'">
                        <input value="See More" type="submit" class="button">
                    </form></td>
                	<td><form action="tenant-update.php" method="post">
                        <input type="hidden" name="TenantID" value="'.$row['TenantID'].'">
                        <input value="Edit" type="submit" class="button">
                    </form></td>
                </tr>';
                  }
                echo'
                <tr>
                    <td colspan="7" class="break">&nbsp;</td>
                </tr>
            </table>';
                mysql_close($con);
            ?>
    <?php include "footer.php"; ?>
    </div>

</body>
</html>
