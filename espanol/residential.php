<!DOCTYPE html>

<html>
<head>
    <title>Residental Properties - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../../../img/favicon.ico" type="image/x-icon">
    <meta name="description" content="La gestión de propiedades residenciales es nuestra especialidad desde 1987. Ofrecemos apartamentos de calidad en Everett, Lynn, Chelsea y Revere.">
<style>
	.top{
		
float: right;
margin-top: -41px;
padding-right: 23px;}
</style>
    
</head>

<body>
    <div id="body">

        
    <?php include 'header.php'; ?>
                <h1>Propiedades Residenciales</h1>
    
        <article>
            <section id="article">
                <p>La gesti&oacute;n de propiedades residenciales es nuestra especialidad desde 1987. Ofrecemos apartamentos de calidad en Everett, Lynn, Chelsea y Revere. Los detalles abajo le proporcionan informaci&oacute;n sobre las unidades y su disponibilidad. Si una unidad tiene una fecha disponible de TAW (tambi&eacute;n conocido como inquilino a voluntad), por favor llene una solicitud y ll&aacute;menos para indicar su inter&eacute;s. Tan pronto como la unidad est&eacute; disponible (que puede ser entre los pr&oacute;ximos 30 d&iacute;as), nos pondremos en contacto con usted.</p>
                <section id="chelsea">
                    <h4>Chelsea</h4>
                    <p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits";
                        $result = mysql_query($sql,$con);

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

                            if (empty($row['Photos'])){
                                $sql2 = "SELECT * FROM Properties where PropertyID = '".$row['PropertyID']."';";
                                $result2 = mysql_query($sql2,$con);
                                $row2 = mysql_fetch_array($result2);

                                $listingimage = $row2['Photos'];
                            } else {
                                $listingimage = $row['Photos'];
                            }

                            if ($decryptedCity == "Chelsea"){
                                echo '
                                <table id="resident-'.$decryptedUnitID.'" class="residentlisting">
                                    <tr>
                                        <td width="295" rowspan="4">
                                            <img src="../img/'.$listingimage.'" alt="'.$row['Description'].'" width="275" />
                                        </td>
                                        <td width="325">'.$decryptedStreetAddress.', '.$decryptedCity.'</td>
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
                                </table>';
                            }
                        }
                                            
                        mysqli_close($con);
                        ?>

                </section>
                <section id="everett">
                    <h4>Everett</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits";
                        $result = mysql_query($sql,$con);


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

                            if (empty($row['Photos'])){
                                $sql2 = "SELECT * FROM Properties where PropertyID = '".$row['PropertyID']."';";
                                $result2 = mysql_query($sql2,$con);
                                $row2 = mysql_fetch_array($result2);

                                $listingimage = $row2['Photos'];
                            } else {
                                $listingimage = $row['Photos'];
                            }


                            if ($decryptedCity == "Everett"){
                                echo '
                                <table id="resident-'.$decryptedUnitID.'" class="residentlisting">
                                    <tr>
                                        <td width="295" rowspan="4">
                                            <img src="../img/'.$listingimage.'" alt="'.$row['Description'].'" width="275" />
                                        </td>
                                        <td width="325">'.$decryptedStreetAddress.', '.$decryptedCity.'</td>
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
                                </table>';
                            }
                        }
                                            
                        mysqli_close($con);
                        ?>
                </section>
                <section id="lynn">
                    <h4>Lynn</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits";
                        $result = mysql_query($sql,$con);


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

                            if (empty($row['Photos'])){
                                $sql2 = "SELECT * FROM Properties where PropertyID = '".$row['PropertyID']."';";
                                $result2 = mysql_query($sql2,$con);
                                $row2 = mysql_fetch_array($result2);

                                $listingimage = $row2['Photos'];
                            } else {
                                $listingimage = $row['Photos'];
                            }


                            if ($decryptedCity == "Lynn"){
                                echo '
                                <table id="resident-'.$decryptedUnitID.'" class="residentlisting">
                                    <tr>
                                        <td width="295" rowspan="4">
                                            <img src="../img/'.$listingimage.'" alt="'.$row['Description'].'" width="275" />
                                        </td>
                                        <td width="325">'.$decryptedStreetAddress.', '.$decryptedCity.'</td>
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
                                </table>';
                            }
                        }
                                            
                        mysqli_close($con);
                        ?>
                </section>
                <section id="revere">
                    <h4>Revere</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits";
                        $result = mysql_query($sql,$con);


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

                            if (empty($row['Photos'])){
                                $sql2 = "SELECT * FROM Properties where PropertyID = '".$row['PropertyID']."';";
                                $result2 = mysql_query($sql2,$con);
                                $row2 = mysql_fetch_array($result2);

                                $listingimage = $row2['Photos'];
                            } else {
                                $listingimage = $row['Photos'];
                            }


                            if ($decryptedCity == "Revere"){
                                echo '
                                <table id="resident-'.$decryptedUnitID.'" class="residentlisting">
                                    <tr>
                                        <td width="295" rowspan="4">
                                            <img src="../img/'.$listingimage.'" alt="'.$row['Description'].'" width="275" />
                                        </td>
                                        <td width="325">'.$decryptedStreetAddress.', '.$decryptedCity.'</td>
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
                                </table>';
                            }
                        }
                                            
                        mysqli_close($con);
                        ?>
                </section>
            </section>   

            <section id="aside">
                <ul>
                    <li><a href="#chelsea">Chelsea</a></li>
                    <li><a href="#everett">Everett</a></li>
                    <li><a href="#lynn">Lynn</a></li>
                    <li><a href="#revere">Revere</a></li>
                </ul>
            </section>
        </article>
        
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
