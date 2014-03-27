<!DOCTYPE html>

<html>
<head>
    <title>Application - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">

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

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO Applications(AppDate, ApplicantFirstName, ApplicantLastName, PresentStAddress, PresentCity, PresentState, PresentZIP, Phone, Married, SpouseMonthlyIncome, SSN, PresentLandlordFirstName, PresentLandlordLastName, PresentLandlordPhone, FormerLandlordFirstName, FormerLandlordLastName, FormerLandlordPhone, CurrentEmployer, EmployerPhone, JobTitle, MonthlyIncome, PersonalReferenceName, PersonalReferencePhone, NumberofCars, NumberofPets) 
                                VALUES
                                (now(), '$_POST[ApplicantFirstName]', '$_POST[ApplicantLastName]', '$_POST[PresentStAddress]', '$_POST[PresentCity]', '$_POST[PresentState]', '$_POST[PresentZIP]', '$_POST[Phone]', '$_POST[Married]', '$_POST[SpouseMonthlyIncome]', '$_POST[SSN]', '$_POST[PresentLandlordFirstName]', '$_POST[PresentLandlordLastName]', '$_POST[PresentLandlordPhone]', '$_POST[FormerLandlordFirstName]', '$_POST[FormerLandlordLastName]', '$_POST[FormerLandlordPhone]', '$_POST[CurrentEmployer]', '$_POST[EmployerPhone]', '$_POST[JobTitle]', '$_POST[MonthlyIncome]', '$_POST[PersonalReferenceName]', '$_POST[PersonalReferencePhone]', '$_POST[NumberofCars]', '$_POST[NumberofPets]')";
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
                                <td><strong>Spouse&#39;s Monthly Income:</strong></td>
                            <td>'.$_POST['SpouseMonthlyIncome'].'</td>
                        </tr>
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
                    ?>

              
            </section>
        </article>

		<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
