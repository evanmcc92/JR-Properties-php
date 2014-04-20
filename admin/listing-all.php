<!DOCTYPE html>

<html>
<head>
    <title>All Listings - Admin - J&R Properties</title>
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
    
        <h1>Listings</h1>
        <?php
                // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT UnitID, StreetAddress, City, DateAvailable FROM ResidentialUnits
                    UNION
                    SELECT UnitID, StreetAddress, City, DateAvailable FROM CommercialUnits";

                $result = mysql_query($sql,$con);
                
                $num_rows = mysql_num_rows($result);


                echo'
            <h3>Total Listings: '.$num_rows.'</h3>
            <h3><a href="listing-add.php">Add New Listing</a></h3>
            
            <table>
            	<tr>
                	<th colspan="6">Listings</th>
                </tr>
                <tr>
                	<th>Unit ID</th>
                	<th>Street Address</th>
                	<th>City</th>
                	<th colspan="2">Options</th>
                </tr>';

                while($row = mysql_fetch_array($result)){

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption

$dataStreetAddress = base64_decode($row['StreetAddress']);
$ivStreetAddress = substr($dataStreetAddress, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataCity = base64_decode($row['City']);
$ivCity = substr($dataCity, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataUnitID = base64_decode($row['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedStreetAddress = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataStreetAddress, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivStreetAddress),"\0");//script to decrypt
$decryptedCity = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataCity, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivCity),"\0");//script to decrypt
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt

                echo'<tr>
                	<td>'.$decryptedUnitID.'</td>
                	<td>'.$decryptedStreetAddress.'</td>
                	<td>'.$decryptedCity.'</td>
                	<td><form action="listing-full.php" method="post">
                    <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                    <input value="See More" type="submit" class="button">
                    </form></td>
                	<td><form action="listing-update.php" method="post">
                    <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                    <input value="Edit" type="submit" class="button">
                    </form></td>
                </tr>';
                  }
                echo'<tr>
                    <td colspan="6" class="break">&nbsp;</td>
                </tr>
            </table>';
                mysql_close($con);
            ?>
    <?php include "footer.php"; ?>
    </div>

</body>
</html>
