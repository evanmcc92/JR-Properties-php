<!DOCTYPE html>

<html>
<head>
    <title>Application - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<meta name="description" content="J&R Properties application for residential tenants..">

    <style>
		table {
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

    <?php include 'header.php'; ?>
                <h1>Application</h1>
    
        <article>
                <p>Thank you for submitting your application. </p>
               

            <section id="applicationform">
            <?php
                    if (isset($_POST['submit'])){
                        
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption

$ApplicantFirstName = $_POST['ApplicantFirstName'];
$ApplicantLastName = $_POST['ApplicantLastName'];
$PresentStAddress = $_POST['PresentStAddress'];
$PresentState = $_POST['PresentState'];
$PresentZIP = $_POST['PresentZIP'];
$SSN = $_POST['SSN'];
$Phone = $_POST['Phone'];

$PresentLandlordFirstName = $_POST['PresentLandlordFirstName'];
$PresentLandlordLastName = $_POST['PresentLandlordLastName'];
$PresentLandlordPhone = $_POST['PresentLandlordPhone'];

$FormerLandlordFirstName = $_POST['FormerLandlordFirstName'];
$FormerLandlordLastName = $_POST['FormerLandlordLastName'];
$FormerLandlordPhone = $_POST['FormerLandlordPhone'];

$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM); //used to add more randomness to the encryption process

$encryptedApplicantFirstName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$ApplicantFirstName,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedApplicantLastName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$ApplicantLastName,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPresentStAddress = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$PresentStAddress,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPresentState = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$PresentState,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPresentZIP = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$PresentZIP,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPresentCity = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['PresentCity'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedSSN = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$SSN,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPhone = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$Phone,MCRYPT_MODE_CBC,$iv)); //script to encrypt

$encryptedPresentLandlordFirstName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$PresentLandlordFirstName,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPresentLandlordLastName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$PresentLandlordLastName,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPresentLandlordPhone = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$PresentLandlordPhone,MCRYPT_MODE_CBC,$iv)); //script to encrypt

$encryptedFormerLandlordFirstName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$FormerLandlordFirstName,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedFormerLandlordLastName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$FormerLandlordLastName,MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedFormerLandlordPhone = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$FormerLandlordPhone,MCRYPT_MODE_CBC,$iv)); //script to encrypt

$encryptedCurrentEmployer = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['CurrentEmployer'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedEmployerPhone = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['EmployerPhone'],MCRYPT_MODE_CBC,$iv)); //script to encrypt

$encryptedPersonalReferenceName = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['PersonalReferenceName'],MCRYPT_MODE_CBC,$iv)); //script to encrypt
$encryptedPersonalReferencePhone = base64_encode($iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$_POST['PersonalReferencePhone'],MCRYPT_MODE_CBC,$iv)); //script to encrypt


                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO Applications(AppDate, ApplicantFirstName, ApplicantLastName, PresentStAddress, PresentCity, PresentState, PresentZIP, Phone, Married, SpouseMonthlyIncome, SSN, PresentLandlordFirstName, PresentLandlordLastName, PresentLandlordPhone, FormerLandlordFirstName, FormerLandlordLastName, FormerLandlordPhone, CurrentEmployer, EmployerPhone, JobTitle, MonthlyIncome, PersonalReferenceName, PersonalReferencePhone, NumberofCars, NumberofPets) 
                                VALUES
                                (now(), '$encryptedApplicantFirstName', '$encryptedApplicantLastName', '$encryptedPresentStAddress', '$encryptedPresentCity', '$encryptedPresentState', '$encryptedPresentZIP', '$encryptedPhone', '$_POST[Married]', '$_POST[SpouseMonthlyIncome]', '$encryptedSSN', '$encryptedPresentLandlordFirstName', '$encryptedPresentLandlordLastName', '$encryptedPresentLandlordPhone', '$encryptedFormerLandlordFirstName', '$encryptedFormerLandlordLastName', '$encryptedFormerLandlordPhone', '$encryptedCurrentEmployer', '$encryptedEmployerPhone', '$_POST[JobTitle]', '$_POST[MonthlyIncome]', '$encryptedPersonalReferenceName', '$encryptedPersonalReferencePhone', '$_POST[NumberofCars]', '$_POST[NumberofPets]')";
                        ;
                        $retval = mysql_query( $sql, $con );
                        if(! $retval ) {
                          die('Error: ' . mysql_error());
                        }
                        echo'
                    <table>
                        <tr>
                          <td colspan="4">'.$_POST['AppDate'].'</td>
                        </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Personal Information</th>
                        </tr>
                        <tr>
                            <td><strong>First Name of Applicant:</strong></td>
                            <td>'.$_POST['ApplicantFirstName'].'</td>
                            <td><strong>Last Name of Applicant:</strong></td>
                            <td>'.$_POST['ApplicantLastName'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Address:</strong></td>
                            <td colspan="3">'.$_POST['PresentStAddress'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present City:</strong></td>
                            <td>'.$_POST['PresentCity'].'</td>
                            <td><strong>Present State:</strong></td>
                            <td>'.$_POST['PresentState'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Zip:</strong></td>
                            <td>'.$_POST['PresentZIP'].'</td>
                            <td><strong>Present Phone Number:</strong></td>
                            <td>'.$_POST['Phone'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Are You Married:</strong></td>
                            <td>'.$_POST['Married'].'</td>
                                <td><strong>Spouse&#39;s Monthly Income:</strong></td>';
                                if ($_POST['SpouseMonthlyIncome']){echo'
                            <td>'.money_format("$%i",$_POST['SpouseMonthlyIncome']).'</td>';
                    }
                        echo '</tr>
                        <tr>
                            <td><strong>SSN:</strong></td>
                            <td>'.$_POST['SSN'].'</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Landlord Information</th>
                        </tr>
                        <tr>
                            <td><strong>Present Landlord&#39;s First Name:</strong></td>
                            <td>'.$_POST['PresentLandlordFirstName'].'</td>
                            <td><strong>Present Landlord&#39;s Last Name:</strong></td>
                            <td>'.$_POST['PresentLandlordLastName'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Landlord&#39;s Phone Number:</strong></td>
                            <td>'.$_POST['PresentLandlordPhone'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Former Landlord&#39;s First Name:</strong></td>
                            <td>'.$_POST['FormerLandlordFirstName'].'</td>
                            <td><strong>Former Landlord&#39;s Last Name:</strong></td>
                            <td>'.$_POST['FormerLandlordLastName'].'</td>
                        </tr>
                       <tr>
                            <td><strong>Former Landlord&#39;s Phone Number:</strong></td>
                            <td>'.$_POST['FormerLandlordPhone'].'</td>
                      </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Employment Information</th>
                        </tr>
                        <tr>
                            <td><strong>Current Employer:</strong></td>
                            <td>'.$_POST['CurrentEmployer'].'</td>
                                <td><strong>Current Employer&#39;s Phone Number:</strong></td>
                            <td>'.$_POST['EmployerPhone'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Job Title:</strong></td>
                            <td>'.$_POST['JobTitle'].'</td>
                                <td><strong>Monthly Income:</strong></td>
                            <td>'.money_format("$%i",$_POST['MonthlyIncome']).'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">References</th>
                        </tr>
                        <tr>
                            <td><strong>Personal Reference&#39;s Name:</strong></td>
                            <td>'.$_POST['PersonalReferenceName'].'</td>
                                <td><strong>Personal Reference&#39;s Phone Number:</strong></td>
                            <td>'.$_POST['PersonalReferencePhone'].'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Additional Information</th>
                        </tr>
                        <tr>
                            <td><strong>Number of Cars:</strong></td>
                            <td>'.$_POST['NumberofCars'].'</td>
                            <td><strong>Number of Pets:</strong></td>
                            <td>'.$_POST['NumberofPets'].'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
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
