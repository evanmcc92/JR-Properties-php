<!DOCTYPE html>

<html>
<head>
    <?php

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

        echo '<title>Property '.$decryptedPropertyID.' Updated - J&R Properties</title>';

        mysql_close($con);
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
   
                <h1>Property</h1>
    
        <article>
            <h3>Property Update</h3>
                    <p><a href="property-all.php">All Properties</a></p>
            <section id="Propertyform">  
            
            <?php
                $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption

                $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM); //used to add more randomness to the encryption process

                $encryptedPropertyID = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['PropertyID'],MCRYPT_MODE_CBC,$iv)); //script to encrypt

                if(isset($encryptedPropertyID)){
                    // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                    // Check connection
                    if (mysqli_connect_errno()){
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $db_selected = mysql_select_db("jrproper_jrproperties",$con);
    				
    				$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
                    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM); //used to add more randomness to the encryption process


                    $encryptedStreetAddress = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['StreetAddress'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
                    $encryptedCity = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['City'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
                    $encryptedState = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['State'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
                    $dataPropertyID = base64_decode($_POST['PropertyID']);
                    $ivPropertyID = substr($dataPropertyID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
                    $decryptedPropertyID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPropertyID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPropertyID),"\0");//script to decrypt


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

                    $sql = "UPDATE Properties 
                    SET  StreetAddress = '$encryptedStreetAddress', City = '$encryptedCity', State = '$encryptedState', PropertyType = '$_POST[PropertyType]', NumberofUnits = '$_POST[NumberofUnits]', Photos = '$picname'
                    WHERE PropertyID = '$_POST[PropertyID]';";

                    $result = mysql_query($sql,$con);

                    if (!$result) {
                      die('Error: ' . mysql_error($con));
                    }

                    echo '
			<table>
                            <tr>
                                <th colspan="2">Property</th>
                            </tr><tr>
                                <td><strong>Property ID</strong></td>
				<td>'.$decryptedPropertyID.'</th>
                        </tr>
                        <tr>
                            <td><b>Street Address:</b></td>
                            <td>'.$_POST['StreetAddress'].'</td>
                        </tr>
                        <tr>
                            <td><strong>City:</strong></td>
                            <td>'.$_POST['City'].'</td>
                        </tr>
                        <tr>
                            <td><strong>State:</strong></td>
                            <td>'.$_POST['State'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Property Type:</strong></td>
                            <td>'.$_POST['PropertyType'].'</td>
                        </tr>
                        <tr>
                            <td><b>Number of Units:</b></td>
                            <td>'.$_POST['NumberofUnits'].'</td>
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
        ?>      
              
            </section>
        
        </article>
 <?php include "footer.php"; ?>
	

  
    </div> 

</body>
</html>