<!DOCTYPE html>

<html>
<head>
    <title>Listing Updated - J&R Properties</title>
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
    <h1>Listing Updated</h1>
    
        <article>
            <h3>Listing Has Been Updated</h3>
            <section id="listingform">
            <?php
    if(isset($_POST['UnitID'])){
        $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$dataUnitID = base64_decode($_POST['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt
        if(strpos($decryptedUnitID,'R') !== false){
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');
                        
                        if(isset($_FILES["Photos"])){
                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["Photos"]["name"]);
                            $picname = $_FILES["Photos"]["name"];
                            $extension = end($temp);
                            if ((($_FILES["Photos"]["type"] == "image/gif")
                                || ($_FILES["Photos"]["type"] == "image/jpeg")
                                || ($_FILES["Photos"]["type"] == "image/jpg")
                                || ($_FILES["Photos"]["type"] == "image/pjpeg")
                                || ($_FILES["Photos"]["type"] == "image/x-png")
                                || ($_FILES["Photos"]["type"] == "image/png"))
                                && ($_FILES["Photos"]["size"] < 20000)
                                && in_array($extension, $allowedExts)){
                                    if ($_FILES["Photos"]["error"] > 0){
                                        echo "Return Code: " . $_FILES["Photos"]["error"] . "<br>";
                                    }else{
                                        if (file_exists("../img/" . $_FILES["Photos"]["name"])){
                                            echo $_FILES["Photos"]["name"] . " already exists. ";
                                        }else{
                                            move_uploaded_file($_FILES["Photos"]["tmp_name"],
                                            "../img/" . $_FILES["Photos"]["name"]);
                                            echo "Stored in: " . "../img/" . $_FILES["file"]["name"];
                                        }
                                    }
                            }
                        } else {
                            if(isset($_POST["PhotoBackup"])){
                                $picname = "";
                            } else {
                                $sql1 = "select * from Properties WHERE PropertyID = '".mysql_real_escape_string($_POST['PropertyID'])."';";
        
                                $result1 = mysql_query($sql1,$con);
                                $row = mysql_fetch_array($result1);
                                $picname = $row["Photos"];
                            }
                        }

                        //vacant input stuff
                        if (isset($_POST['Vacant'])){
                            $Vacant = "Yes";
                        } else {
                            $Vacant = "No";
                        }

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
//encryption stuff
$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM); //used to add more randomness to the encryption process


$encryptedPropertyID = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['PropertyID'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedStreetAddress = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['StreetAddress'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedCity = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['City'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedUnitID = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['UnitID'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedState = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['State'],MCRYPT_MODE_CBC,$iv)); //script to encrypt

$dataPropertyID = base64_decode($_POST['PropertyID']);
$ivPropertyID = substr($dataPropertyID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedPropertyID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPropertyID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPropertyID),"\0");//script to decrypt

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "UPDATE ResidentialUnits
                                SET UnitName = '$_POST[UnitName]', PropertyID = '$_POST[PropertyID]', StreetAddress = '$encryptedStreetAddress', City = '$encryptedCity', State = '$encryptedState', DateAvailable = '$_POST[DateAvailable]', DateAvailable = '$_POST[DateAvailable]', Description = '$_POST[Description]', MonthlyPrice = '$_POST[MonthlyPrice]', Photos = '$picname', NoBeds = '$_POST[NoBeds]', NoBaths = '$_POST[NoBaths]', Vacant = '$Vacant'
                                WHERE UnitID = '$_POST[UnitID]'";

                        $result = mysql_query($sql,$con);

                        echo '
                        <p><a href="listing-all.php">All Listings</a></p>
                            <table>
                                <tr>
                                    <th colspan="2">Residential Listing</th>
                                </tr>
                                <tr>
                                    <td><strong>Unit ID*:</strong></td>
                                    <td>'.$decryptedUnitID.'</td>
                                </tr>
                                <tr>
                                    <td><strong>Unit Name:</strong></td>
                                    <td>'.$_POST['UnitName'].'</td>
                                </tr>
                                    <tr>
                                        <td><strong>Vacant:</strong></td>
                                        <td>'.$Vacant.'</td>
                                    </tr>
                                <tr>
                                    <td><strong>Property ID*:</strong></td>
                                    <td>'.$decryptedPropertyID.'</td>
                                </tr>
                                <tr>
                                    <td><strong>Street Address*:</strong></td>
                                    <td>'.$_POST['StreetAddress'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>City*:</strong></td>
                                    <td>'.$_POST['City'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>State*:</strong></td>
                                    <td>'.$_POST['State'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Date Available*:</strong></td>
                                    <td>'.$_POST['DateAvailable'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Number of Bedrooms:</strong></td>
                                    <td>'.$_POST['NoBeds'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Number of Bathrooms:</strong></td>
                                    <td>'.$_POST['NoBaths'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Monthly Price*:</strong></td>
                                    <td>'.$_POST['MonthlyPrice'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Description*:</strong></td>
                                    <td>'.$_POST['Description'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Photos</strong></td>
                                    <td><img src="../img/'.$picname .'"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="break">&nbsp;</td>
                                </tr>
                            </table>';

                    } else {


                        $con = mysql_connect('127.0.0.1:33067','root','');

                        if(isset($_FILES["Photos"])){
                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["Photos"]["name"]);
                            $picname = $_FILES["Photos"]["name"];
                            $extension = end($temp);
                            if ((($_FILES["Photos"]["type"] == "image/gif")
                                || ($_FILES["Photos"]["type"] == "image/jpeg")
                                || ($_FILES["Photos"]["type"] == "image/jpg")
                                || ($_FILES["Photos"]["type"] == "image/pjpeg")
                                || ($_FILES["Photos"]["type"] == "image/x-png")
                                || ($_FILES["Photos"]["type"] == "image/png"))
                                && ($_FILES["Photos"]["size"] < 20000)
                                && in_array($extension, $allowedExts)){
                                    if ($_FILES["Photos"]["error"] > 0){
                                        echo "Return Code: " . $_FILES["Photos"]["error"] . "<br>";
                                    }else{
                                        if (file_exists("../img/" . $_FILES["Photos"]["name"])){
                                            echo $_FILES["Photos"]["name"] . " already exists. ";
                                        }else{
                                            move_uploaded_file($_FILES["Photos"]["tmp_name"],
                                            "../img/" . $_FILES["Photos"]["name"]);
                                            echo "Stored in: " . "../img/" . $_FILES["file"]["name"];
                                        }
                                    }
                            }
                        } else {
                            if(isset($_POST["PhotoBackup"])){
                                $picname = "";
                            } else {
                                $sql1 = "select * from Properties WHERE PropertyID = '".mysql_real_escape_string($_POST['PropertyID'])."';";
        
                                $result1 = mysql_query($sql1,$con);
                                $row = mysql_fetch_array($result1);
                                $picname = $row["Photos"];
                            }
                        }

                        //vacant input stuff
                        if (isset($_POST['Vacant'])){
                            $Vacant = "Yes";
                        } else {
                            $Vacant = "No";
                        }

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
//encryption stuff
$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM); //used to add more randomness to the encryption process


$encryptedPropertyID = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['PropertyID'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedStreetAddress = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['StreetAddress'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedCity = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['City'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedUnitID = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['UnitID'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedState = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['State'],MCRYPT_MODE_CBC,$iv)); //script to encrypt

$dataPropertyID = base64_decode($_POST['PropertyID']);
$ivPropertyID = substr($dataPropertyID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedPropertyID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPropertyID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPropertyID),"\0");//script to decrypt

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);

                        
                        $sql = "UPDATE CommercialUnits 
                                SET UnitName = '$_POST[UnitName]', PropertyID = '$_POST[PropertyID]', StreetAddress = '$encryptedStreetAddress', City = '$encryptedCity', State = '$encryptedState', DateAvailable = '$_POST[DateAvailable]', DateAvailable = '$_POST[DateAvailable]', Description = '$_POST[Description]', MonthlyPrice = '$_POST[MonthlyPrice]', Photos = '$picname', Vacant = '$Vacant'
                                WHERE UnitID = '$_POST[UnitID]'";

                        $result = mysql_query($sql,$con);

                        $result = mysql_query($sql,$con);

                        echo '<p><a href="listing-all.php">All Listings</a></p>
                            <table>
                                <tr>
                                    <th colspan="2">Commercial Listing</th>
                                </tr>
                                <tr>
                                    <td><strong>Unit ID*:</strong></td>
                                    <td>'.$decryptedUnitID.'</td>
                                </tr>
                                <tr>
                                    <td><strong>Unit Name:</strong></td>
                                    <td>'.$_POST['UnitName'].'</td>
                                </tr>
                                    <tr>
                                        <td><strong>Vacant:</strong></td>
                                        <td>'.$Vacant.'</td>
                                    </tr>
                                <tr>
                                    <td><strong>Property ID*:</strong></td>
                                    <td>'.$decryptedPropertyID.'</td>
                                </tr>
                                <tr>
                                    <td><strong>Street Address*:</strong></td>
                                    <td>'.$_POST['StreetAddress'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>City*:</strong></td>
                                    <td>'.$_POST['City'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>State*:</strong></td>
                                    <td>'.$_POST['State'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Date Available*:</strong></td>
                                    <td>'.$_POST['DateAvailable'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Monthly Price*:</strong></td>
                                    <td>'.$_POST['MonthlyPrice'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Description*:</strong></td>
                                    <td>'.$_POST['Description'].'</td>
                                </tr>
                                <tr>
                                    <td><strong>Photos</strong></td>
                                    <td><img src="../img/'.$picname .'"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="break">&nbsp;</td>
                                </tr>
                            </table>';
                    }
                }
            ?> 
            </section>
        </article>

    <?php include "footer.php"; ?>

  
    </div> 

</body>
</html>
