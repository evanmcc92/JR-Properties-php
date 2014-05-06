<!DOCTYPE html>

<html>
<head>
    <title>Maintenance - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">   
<meta name="description" content="J&R Properties is sorry to hear that you are experiencing inconveniences with your unit. Our team will begin to resolve any issues to the best of our ability.">
</head>

<body>
                    <?php
                    if (isset($_POST['submit'])){

                        if(empty($_POST['Plumbing'])){
                            $Plumbing = "No";
                        } else {
                            $Plumbing = "Yes";
                        }

                        if(empty($_POST['Electric'])){
                            $Electric = "No";
                        } else {
                            $Electric = "Yes";
                        }

                        if(empty($_POST['Other'])){
                            $Other = "No";
                        } else {
                            $Other = "Yes";
                        }
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

//encryption
$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg==';  //password for encryption
$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM); //used to add more randomness to the encryption process


$encryptedTenantFirstName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['TenantFirstName'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedTenantLastName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['TenantLastName'],MCRYPT_MODE_CBC,$iv)); //script to encrypt



                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO MaintenanceTickets (IssueDate, TenantFirstName, TenantLastName, UnitID, Plumbing, Electric, Other, Description, Resolved)
                                VALUES
                                (now(),'$encryptedTenantFirstName','$encryptedTenantLastName','$_POST[UnitID]','$Plumbing','$Electric','$Other','$_POST[Description]', 'No')";
                        
                        $retval = mysql_query( $sql, $con );
                        if(! $retval ) {
                          die('Error: ' . mysql_error());
                        }
                        echo'<script>alert("We apologize for the maintenance related incovenience. We will process your request to the best of our ability. For updates regarding your service request, please call (781) 974-5790.");</script>';
                    
                        mysql_close($con); 
                    }                       
                    ?>

    <div id="body">

    <?php include 'header.php'; ?>
    
                <h1>Maintenance</h1>
        <article>
                <p>We  are sorry to hear that you are experiencing inconveniences with your unit.  Please fill out the form below with your name, phone and description of the  issue. Upon submitting the form, our team will begin to resolve the issue to  the best of our ability. </p>
               
            <section id="maintenanceform">
                <form method="POST" action="<?php $_PHP_SELF ?>">
                    <p>First Name: <input name="TenantFirstName" id="TenantFirstName" size="50" Required="YES" Message="Please enter First Name."></p>
                    <p>Last Name: <input name="TenantLastName" id="TenantLastName" size="50" Required="YES" Message="Please enter Last Name."></p>
                    <p><select name="UnitID" id="UnitID">
                    <option>Select Your Unit</option>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT UnitID FROM ResidentialUnits UNION All SELECT UnitID FROM CommercialUnits Order by UnitID";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {
                          $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$dataUnitID = base64_decode($row['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt


                            echo '<option value="'.$row['UnitID'].'">'.$decryptedUnitID.'</option>';
                      
                          }
                        mysql_close($con); 

                                            
                        ?>
                    </select>
                    </p>
                    <p><input type="checkbox" name="Plumbing" value="Y">Plumbing 
                    <input type="checkbox" name="Electric" value="Y">Electric 
                    <input type="checkbox" name="Other" value="Y">Other</p>
                    <p>Description:<br>
                        <textarea name="Description" id="description" cols="43" rows="5" placeholder="Enter comments here."></textarea>
                    </p>
                    <p><input type="submit" name="submit" value="Submit" class="button"> <input type="reset" value="Reset" class="button"></p> 
                </form>                
            </section>
        </article>
        
<?php include 'footer.php'; ?>

    </div>

</body>
</html>
