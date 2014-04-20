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
    <?php
    if(isset($_POST['UnitID'])){
        $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$dataUnitID = base64_decode($_POST['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt
if(strpos($decryptedUnitID,'R') !== false){
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM ResidentialUnits WHERE UnitID = '".mysql_real_escape_string($_POST['UnitID'])."';";

                $result = mysql_query($sql,$con);
                $row = mysql_fetch_array($result);

                echo '
        <article>
            <section id="listingform">
                    <p><a href="listing-all.php">All Listings</a></p>
                    <form method="post" action="listing-delete.php">
                        <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                        <input type="submit" value="Delete Unit" class="button">
                    </form>
                    <form method="post" action="listing-update-action.php" enctype="multipart/form-data">
                    	<table>
                            <tr>
                                <th colspan="2">Residential Listing</th>
                            </tr>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td><input name="UnitID" id="UnitID" type="text" required value="'.$row['UnitID'].'" readonly></td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td><input name="UnitName" id="UnitName" type="text" value="'.$row['UnitName'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td><select name="PropertyID">
                                        <option value="'.$row['PropertyID'].'">Current - '.$row['PropertyID'].'</option>';
                                $sql2 = "SELECT PropertyID FROM Properties";
                                $result2 = mysql_query($sql2,$con);


                                while($row2 = mysql_fetch_array($result2)){
                                    echo '<option value="'.$row2['PropertyID'].'">'.$row2['PropertyID'].'</option>';
                                }

                                echo '
                                </select></td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td><input name="StreetAddress" id="StreetAddress" type="text" value="'.$row['StreetAddress'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td><input name="City" id="City" type="text" value="'.$row['City'].'" ></td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td><select name="State">
                                    <option value="'.$row['State'].'">Current - '.$row['State'].'</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td><input name="DateAvailable" id="DateAvailable" type="text" value="'.$row['DateAvailable'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Number of Bedrooms:</strong></td>
                                <td> <select name="NoBeds" id="NoBeds">
                                        <option value="'.$row['NoBeds'].'">Current - '.$row['NoBeds'].'</option>
                                          <option value="Studio">Studio</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4+">4+</option>
                            		</select></td>
                            </tr>
                            <tr>
                        		<td><strong>Number of Bathrooms:</strong></td>
                                <td><select name="NoBaths" id="NoBaths">
                                        <option value="'.$row['NoBaths'].'">Current - '.$row['NoBaths'].'</option>
                                        <option value="1/2">1/2</option>
                                        <option value="1">1</option>
                                        <option value="1 1/2">1 1/2</option>
                                        <option value="2+">2+</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td><input name="MonthlyPrice" id="MonthlyPrice" type="text" value="'.$row['MonthlyPrice'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Description*:</strong></td>
                                <td><textarea name="Description" id="Description" >'.$row['Description'].'</textarea></td>
                            </tr>
                            <tr>
                                <td><strong>Photos:</strong></td>
                                <td><input type="file" name="Photos" value="'.$row['Photos'].'"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" class="button"></td>
                            </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                    </form>';

                } else {


                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM CommercialUnits WHERE UnitID = '".mysql_real_escape_string($_POST["UnitID"])."';";

                $result = mysql_query($sql,$con);

                $row = mysql_fetch_array($result);
$dataStreetAddress = base64_decode($row['StreetAddress']);
$ivStreetAddress = substr($dataStreetAddress, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataCity = base64_decode($row['City']);
$ivCity = substr($dataCity, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataUnitID = base64_decode($row['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataState = base64_decode($row['State']);
$ivState = substr($dataState, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataPropertyID = base64_decode($row['PropertyID']);
$ivPropertyID = substr($dataPropertyID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedStreetAddress = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataStreetAddress, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivStreetAddress),"\0");//script to decrypt
$decryptedCity = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataCity, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivCity),"\0");//script to decrypt
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt
$decryptedState = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataState, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivState),"\0");//script to decrypt
$decryptedPropertyID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPropertyID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPropertyID),"\0");//script to decrypt

                    echo '
            		
                    <p><a href="listing-all.php">All Listings</a></p>
                    <form method="post" action="listing-delete.php">
                        <input type="hidden" name="UnitID" value="'.$row['UnitID'].'">
                        <input type="submit" value="Delete Unit" class="button">
                    </form>
                    <form method="post" action="listing-update-action.php" enctype="multipart/form-data">
                    	<table>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td><input name="UnitID" id="UnitID" type="text" required value="'.$decryptedUnitID.'" readonly></td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td><input name="UnitName" id="UnitName" type="text" value="'.$row['UnitName'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td><select name="PropertyID">
                                        <option value="'.$decryptedPropertyID.'">Current - '.$decryptedPropertyID.'</option>';
                                $sql2 = "SELECT PropertyID FROM Properties";
                                $result2 = mysql_query($sql2,$con);


                                while($row2 = mysql_fetch_array($result2)){
                                    echo '<option value="'.$row2['PropertyID'].'">'.$row2['PropertyID'].'</option>';
                                }

                                echo '
                                </select></td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td><input name="StreetAddress" id="StreetAddress" type="text" value="'.$decryptedStreetAddress.'"></td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td><input name="City" id="City" type="text" value="'.$decryptedCity.'" ></td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td><select name="State">
                                    <option value="'.$decryptedState.'">Current - '.$decryptedState.'</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td><input name="DateAvailable" id="DateAvailable" type="text" value="'.$row['DateAvailable'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td><input name="MonthlyPrice" id="MonthlyPrice" type="text" value="'.$row['MonthlyPrice'].'"></td>
                            </tr>
                            <tr>
                                <td><strong>Description*:</strong></td>
                                <td><textarea name="Description" id="Description" >'.$row['Description'].'</textarea></td>
                            </tr>
                            <tr>
                                <td><strong>Photos:</strong></td>
                                <td><p>'.$row['Photos'].'<br>
                                <img src="../img/'.$row['Photos'].'"/></p><input type="file" name="Photos" value="'.$row['Photos'].'"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" class="button"></td>
                            </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                    
              
            </section>
        </article>';
            }
            }
            ?>
    <?php include "footer.php"; ?>

  
    </div> 

</body>
</html>
