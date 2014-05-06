<!DOCTYPE html>

<html>
<head>
    <title>Commercial Properties - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
<meta name="description" content="Las descripciones y fotografías de nuestras propiedades comerciales en Revere and Everett.">


    
</head>

<body>

    <div id="body">

    <?php include 'header.php'; ?>
                <h1>Propiedades Comerciales</h1>
    
        <article>
                <p>Vea a continuaci&oacute;n las descripciones y fotograf&iacute;as de nuestras propiedades comerciales. En estos momentos estamos buscando ampliar nuestro portafolio de nuestras propiedades comerciales.</p>
                <section>
        <?php
                // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM CommercialUnits";
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

                        echo '<table id="resident-'.$decryptedUnitID.'" class="residentlisting">
                                <tr>
                                    <td width="295" rowspan="4">
                                        <img src="../img/'.$listingimage.'" alt="'.$row['Description'].'" width="275" />
                                    </td>
                                    <td width="325">'.$decryptedStreetAddress.', '.$decryptedCity.'</td>
                                </tr>
                                <tr>
                                    <td>'.$row['UnitName'].'</td>
                                </tr>
                                <tr>
                                    <td>'.money_format('$%i',$row['MonthlyPrice']).' (monthly)</td>
                                </tr>
                                <tr>
                                    <td>Date Available: '.$row['DateAvailable'].'</td>
                                </tr>
                                <tr>
                                    <td>'.$row['Description'].'</td>
                                </tr>
                            </table>';
                    }
                                    
                mysql_close($con);
                ?>
                </section>
        </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
