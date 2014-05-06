<!DOCTYPE html>

<html>
<head>
    <title>Applications - Admin - J&R Properties</title>
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
        <h1>Applications</h1>
<h3>The following application has been deleted.</h3> 
        <?php
                if(isset($_POST['ApplicationID'])){
                        
                        // Create connection
                        
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);


                $sql = "SELECT * FROM Applications where ApplicationID = ".mysql_real_escape_string($_POST['ApplicationID']);
                      
                $result = mysql_query($sql,$con);

                $row = mysql_fetch_array($result);

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption //password for encryption
$dataApplicantFirstName = base64_decode($row['ApplicantFirstName']);
$ivApplicantFirstName = substr($dataApplicantFirstName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataApplicantLastName = base64_decode($row['ApplicantLastName']);
$ivApplicantLastName = substr($dataApplicantLastName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataPresentStAddress = base64_decode($row['PresentStAddress']);
$ivPresentStAddress = substr($dataPresentStAddress, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataPresentCity = base64_decode($row['PresentCity']);
$ivPresentCity = substr($dataPresentCity, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)); 

$dataPresentZIP = base64_decode($row['PresentZIP']);
$ivPresentZIP = substr($dataPresentZIP, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataPhone = base64_decode($row['Phone']);
$ivPhone = substr($dataPhone, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataSSN = base64_decode($row['SSN']);
$ivSSN = substr($dataSSN, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataPresentState = base64_decode($row['PresentState']);
$ivPresentState = substr($dataPresentState, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataPresentLandlordFirstName = base64_decode($row['PresentLandlordFirstName']);
$ivPresentLandlordFirstName = substr($dataPresentLandlordFirstName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataPresentLandlordLastName = base64_decode($row['PresentLandlordLastName']);
$ivPresentLandlordLastName = substr($dataPresentLandlordLastName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataPresentLandlordPhone = base64_decode($row['PresentLandlordPhone']);
$ivPresentLandlordPhone = substr($dataPresentLandlordPhone, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataFormerLandlordFirstName = base64_decode($row['FormerLandlordFirstName']);
$ivFormerLandlordFirstName = substr($dataFormerLandlordFirstName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataFormerLandlordLastName = base64_decode($row['FormerLandlordLastName']);
$ivFormerLandlordLastName = substr($dataFormerLandlordLastName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataFormerLandlordPhone = base64_decode($row['FormerLandlordPhone']);
$ivFormerLandlordPhone = substr($dataFormerLandlordPhone, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataCurrentEmployer = base64_decode($row['CurrentEmployer']);
$ivCurrentEmployer = substr($dataCurrentEmployer, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataEmployerPhone = base64_decode($row['EmployerPhone']);
$ivEmployerPhone = substr($dataEmployerPhone, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$dataPersonalReferenceName = base64_decode($row['PersonalReferenceName']);
$ivPersonalReferenceName = substr($dataPersonalReferenceName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataPersonalReferencePhone = base64_decode($row['PersonalReferencePhone']);
$ivPersonalReferencePhone = substr($dataPersonalReferencePhone, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

//decryption stuff
$decryptedApplicantFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataApplicantFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivApplicantFirstName),"\0");//script to decrypt

$decryptedApplicantLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataApplicantLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivApplicantLastName),"\0");//script to decrypt

$decryptedPresentStAddress = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPresentStAddress, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPresentStAddress),"\0");//script to decrypt

$decryptedPresentCity = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPresentCity, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPresentCity),"\0");//script to decrypt

$decryptedPresentZIP = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPresentZIP, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPresentZIP),"\0");//script to decrypt

$decryptedPhone = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPhone, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPhone),"\0");//script to decrypt

$decryptedSSN = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataSSN, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivSSN),"\0");//script to decrypt

$decryptedPresentState = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPresentState, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPresentState),"\0");//script to decrypt

$decryptedPresentLandlordFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPresentLandlordFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPresentLandlordFirstName),"\0");//script to decrypt
$decryptedPresentLandlordLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPresentLandlordLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPresentLandlordLastName),"\0");//script to decrypt
$decryptedPresentLandlordPhone = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPresentLandlordPhone, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPresentLandlordPhone),"\0");//script to decrypt

$decryptedFormerLandlordFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataFormerLandlordFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivFormerLandlordFirstName),"\0");//script to decrypt
$decryptedFormerLandlordLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataFormerLandlordLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivFormerLandlordLastName),"\0");//script to decrypt
$decryptedFormerLandlordPhone = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataFormerLandlordPhone, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivFormerLandlordPhone),"\0");//script to decrypt

$decryptedCurrentEmployer = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataCurrentEmployer, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivCurrentEmployer),"\0");//script to decrypt
$decryptedEmployerPhone = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataEmployerPhone, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivEmployerPhone),"\0");//script to decrypt

$decryptedPersonalReferenceName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPersonalReferenceName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPersonalReferenceName),"\0");//script to decrypt
$decryptedPersonalReferencePhone = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataPersonalReferencePhone, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivPersonalReferencePhone),"\0");//script to decrypt

//echo the results

                        echo '<p>
                        <form action="applicant-delete.php" method="post">
                            <input type="hidden" name="ApplicationID" value="'.$_POST['ApplicationID'].'">
                            <input value="Delete" type="submit" class="button">
                        </form>
                    </p>
                    <p><a href="applicant-all.php">All Applications</a>                                  
                    <p>&nbsp;</p>
                    <table>
                        <tr>
                          <td colspan="4">'.$row['AppDate'].'</td>
                        </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <th colspan="4">Personal Information</th>
                        </tr>
                        <tr>
                            <td><strong>First Name of Applicant:</strong></td>
                            <td>'.$decryptedApplicantFirstName.'</td>
                            <td><strong>Last Name of Applicant:</strong></td>
                            <td>'.$decryptedApplicantLastName.'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Address:</strong></td>
                            <td colspan="3">'.$decryptedPresentStAddress.'</td>
                        </tr>
                        <tr>
                            <td><strong>Present City:</strong></td>
                            <td>'.$decryptedPresentCity.'</td>
                            <td><strong>Present State:</strong></td>
                            <td>'.$decryptedPresentState.'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Zip:</strong></td>
                            <td>'.$decryptedPresentZIP.'</td>
                            <td><strong>Present Phone Number:</strong></td>
                            <td>'.$decryptedPhone.'</td>
                        </tr>
                        <tr>
                            <td><strong>Are You Married:</strong></td>
                            <td>'.$row['Married'].'</td>
                            <td><strong>Spouse&#39;s Monthly Income:</strong></td>';
                                if ($row['SpouseMonthlyIncome']){echo'
                            <td>'.money_format("$%i",$row['SpouseMonthlyIncome']).'</td>';
                    }
                        echo '
                        </tr>
                        <tr>
                            <td><strong>SSN:</strong></td>
                            <td>'.$decryptedSSN.'</td>
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
                            <td>'.$decryptedPresentLandlordFirstName.'</td>
                            <td><strong>Present Landlord&#39;s Last Name:</strong></td>
                            <td>'.$decryptedPresentLandlordLastName.'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Landlord&#39;s Phone Number:</strong></td>
                            <td>'.$decryptedPresentLandlordPhone.'</td>
                        </tr>
                        <tr>
                            <td><strong>Former Landlord&#39;s First Name:</strong></td>
                            <td>'.$decryptedFormerLandlordFirstName.'</td>
                            <td><strong>Former Landlord&#39;s Last Name:</strong></td>
                            <td>'.$decryptedFormerLandlordLastName.'</td>
                        </tr>
                       <tr>
                            <td><strong>Former Landlord&#39;s Phone Number:</strong></td>
                            <td>'.$decryptedFormerLandlordPhone.'</td>
                      </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Employment Information</th>
                        </tr>
                        <tr>
                            <td><strong>Current Employer:</strong></td>
                            <td>'.$decryptedCurrentEmployer.'</td>
                            <td><strong>Current Employer&#39;s Phone Number:</strong></td>
                            <td>'.$decryptedEmployerPhone.'</td>
                        </tr>
                        <tr>
                            <td><strong>Job Title:</strong></td>
                            <td>'.$row['JobTitle'].'</td>
                                <td><strong>Monthly Income:</strong></td>
                            <td>'.money_format("$%i",$row['MonthlyIncome']).'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">References</th>
                        </tr>
                        <tr>
                            <td><strong>Personal Reference&#39;s Name:</strong></td>
                            <td>'.$decryptedPersonalReferenceName.'</td>
                            <td><strong>Personal Reference&#39;s Phone Number:</strong></td>
                            <td>'.$decryptedPersonalReferencePhone.'</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Additional Information</th>
                        </tr>
                        <tr>
                            <td><strong>Number of Cars:</strong></td>
                            <td>'.$row['NumberofCars'].'</td>
                            <td><strong>Number of Pets:</strong></td>
                            <td>'.$row['NumberofPets'].'</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                    </table>';
                $sql2 = "DELETE FROM Applications WHERE ApplicationID = ".mysql_real_escape_string($_POST['ApplicationID']);
                $result2 = mysql_query($sql2,$con);
                    }     
                    mysql_close($con);            
                    ?>
    <?php include "footer.php"; ?>
    </div>

</body>
</html>
