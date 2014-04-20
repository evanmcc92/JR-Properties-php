<!DOCTYPE html>

<html>
<head><?php
    echo '
    <title>Listing No. '.$_POST['UnitID'].'- J&R Properties</title>';
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
			margin: 0 auto 20px;
		}
		td, th {
			padding: 0 5px;
		}
	</style>
    
</head>

<body>


    <div id="body">

    <?php include "header.php"; ?>
    <?php
    if(isset($_POST['UnitID'])){
$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$dataUnitID = base64_decode($_POST['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt

        if(strpos($decryptedUnitID,'R') !== false){
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM ResidentialUnits WHERE UnitID = '".mysql_real_escape_string($_POST['UnitID'])."';";

                $result = mysql_query($sql,$con);

                $row = mysql_fetch_array($result);


                echo '


            <section id="residentunits">
                <h1>Listing No. '.$row['UnitID'].'</h1>
                    <p><form action="listing-delete.php" method="post" id="delete-listing">
                      <p>
                        <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                        <input value="Delete" type="submit" class="button">
                      </p>
                      <p>
                    </form>
                    <form action="listing-update.php" method="post">
                    <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                    <input value="Edit" type="submit" class="button">
                    </form></p>
                    <p><a href="listing-all.php">All Listings</a></p>
                    <p>&nbsp;</p>
                
                    <table id="resident-'.$row['UnitID'].'" class="residentlisting">
                        <tr>
                            <td width="295" rowspan="6">
                                <img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />
                            </td>
                            <td width="325">'.$row['StreetAddress'].', '.$row['City'].'</td>
                        </tr>
                        <tr>
                            <td>Vacant: '.$row['Vacant'].'</td>
                        </tr>
                        <tr>
                            <td>'.money_format("$%i",$row['MonthlyPrice']).' (monthly)</td>
                        </tr>
                        <tr>
                            <td>'.$row['NoBeds'].' Bed & '.$row['NoBaths'].' Bath</td>
                        </tr>
                        <tr>
                            <td>Date Available: '.$row['DateAvailable'].'</td>
                        </tr>
                        <tr>
                            <td>'.$row['Description'].'</td>
                        </tr>
                    </table>
                    </section> 

              
            </section>
        </article>';
    } else {
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM CommercialUnits WHERE UnitID = '".mysql_real_escape_string($_POST['UnitID'])."';";

                $result = mysql_query($sql,$con);
                $row = mysql_fetch_array($result);


$dataStreetAddress = base64_decode($row['StreetAddress']);
$ivStreetAddress = substr($dataStreetAddress, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataCity = base64_decode($row['City']);
$ivCity = substr($dataCity, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataUnitID = base64_decode($row['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedStreetAddress = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataStreetAddress, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivStreetAddress),"\0");//script to decrypt
$decryptedCity = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataCity, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivCity),"\0");//script to decrypt
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt

                echo '
        <article>

                <h1>Listing No. '.$decryptedUnitID.'</h1>

            <section id="applicationform">
                    <p><form action="listing-delete.php" method="post" id="delete-ticket">
                      <p>
                        <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                        <input value="Delete" type="submit" class="button">
                      </p>
                      <p>
                    </form>
                    <form action="listing-update.php" method="post">
                    <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                    <input value="Edit" type="submit" class="button">
                    </form></p>
                    <p><a href="listing-all.php">All Listings</a></p>
                    <p>&nbsp;</p>
                
                    <table id="commercial-'.$row['UnitID'].'" class="residentlisting">
                        <tr>
                            <td width="295" rowspan="5">
                                <img src="../img/'.$decryptedStreetAddress.'.png" alt="'.$row['Description'].'" width="275" />
                            </td>
                            <td width="325">'.$decryptedStreetAddress.', '.$decryptedCity.'</td>
                        </tr>
                        <tr>
                            <td>'.$row['UnitName'].'</td>
                        </tr>
                        <tr>
                            <td>Vacant: '.$row['Vacant'].'</td>
                        </tr>
                        <tr>
                            <td>'.money_format("$%i",$row['MonthlyPrice']).' (monthly)</td>
                        </tr>
                        <tr>
                            <td>Date Available: '.$row['DateAvailable'].'</td>
                        </tr>
                        <tr>
                            <td>'.$row['Description'].'</td>
                        </tr>
                    </table>
                    </section>';
            }
        }
            ?>
    <?php include "footer.php"; ?>

  
    </div>

</body>
</html>
