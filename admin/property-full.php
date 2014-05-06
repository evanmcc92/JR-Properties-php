<!DOCTYPE html>

<html>
<head>
	<?php
	echo'
    <title>Property '.$_POST['PropertyID'].' - J&R Properties</title>
    ';
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
    
</head>

<body>


    <div id="body">

    <?php include "header.php";?>
    

                            
    <?php

    if(isset($_POST['PropertyID'])){
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "select * from Properties WHERE PropertyID = '".mysql_real_escape_string($_POST['PropertyID'])."';";

                $result = mysql_query($sql,$con);
                $row = mysql_fetch_array($result);

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption

$dataPropertyID = base64_decode($row['PropertyID']);
$ivPropertyID = substr($dataPropertyID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedPropertyID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPropertyID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPropertyID),"\0");//script to decrypt

$dataStreetAddress = base64_decode($row['StreetAddress']);
$ivStreetAddress = substr($dataStreetAddress, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedStreetAddress = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataStreetAddress, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivStreetAddress),"\0");//script to decrypt

$dataCity = base64_decode($row['City']);
$ivCity = substr($dataCity, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedCity = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataCity, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivCity),"\0");//script to decrypt

$dataState = base64_decode($row['State']);
$ivState = substr($dataState, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedState = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataState, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivState),"\0");//script to decrypt


                echo'
                <h1>Property '.$decryptedPropertyID.'</h1>
                
        <article>


            <section id="propertyform">
                	<p><form action="property-delete.php" method="post" id="delete-ticket">
                        <input type="hidden" name="PropertyID" value="'.$row['PropertyID'].'">
                        <input value="Delete" type="submit" class="button">
                	</form>
			</p>
                	<p><form action="property-update.php" method="post">
                    <input type="hidden" name="PropertyID" value="'.$row['PropertyID'].'">
                    <input value="Edit" type="submit" class="button">
                    </form></p>
                    <p><a href="property-all.php">All Properties</a></p>
                    <p>&nbsp;</p>
                
                    <table id="'.$decryptedPropertyID.'">
                        <tr>
                                <th colspan="4">Property '.$decryptedPropertyID.'</th>
                        </tr>
                        <tr>
                            <td><b>Street Address:</b></td>
                            <td>'.$decryptedStreetAddress.'</td>
                            <td><strong>City:</strong></td>
                            <td>'.$decryptedCity.'</td>
                        </tr>
                        <tr>
                            <td><strong>State:</strong></td>
                            <td>'.$decryptedState.'</td>
                            <td><strong>Property Type:</strong></td>
                            <td>'.$row['PropertyType'].'</td>
                        </tr>
                        <tr>
                            <td><b>Number of Units:</b></td>
                            <td>'.$row['NumberofUnits'].'</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
						
                                <tr>
                                    <td colspan="2"><strong>Photos</strong></td>
                                    <td colspan="2"><img src="../img/'.$row['Photos'] .'"></td>
                                </tr>
                        <tr>
                             <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                  </table>
                    </section>
              

              
            </section>
        </article>
';
}
?>
		<?php include "footer.php";?>

  
    </div>

</body>
</html>
