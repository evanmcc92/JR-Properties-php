<!DOCTYPE html>

<html>
<head>
    <title>Application - J&R Properties</title>
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
<?php
if(isset($_POST['ApplicationID'])){
                        
                        // Create connection
                        
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);


                        $sql = "SELECT * FROM Applications where ApplicationID = ".mysql_real_escape_string($_POST['ApplicationID']);

                      
                $result = mysql_query($sql,$con);

                        $row = mysql_fetch_array($result);


                    

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
                            <td>'.$row['ApplicantFirstName'].'</td>
                            <td><strong>Last Name of Applicant:</strong></td>
                            <td>'.$row['ApplicantLastName'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Address:</strong></td>
                            <td colspan="3">'.$row['PresentStAddress'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present City:</strong></td>
                            <td>'.$row['PresentCity'].'</td>
                            <td><strong>Present State:</strong></td>
                            <td>'.$row['PresentState'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Zip:</strong></td>
                            <td>'.$row['PresentZIP'].'</td>
                            <td><strong>Present Phone Number:</strong></td>
                            <td>'.$row['Phone'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Are You Married:</strong></td>
                            <td>'.$row['Married'].'</td>
                            <td><strong>Spouse&#39;s Monthly Income:</strong></td>
                            <td>'.$row['SpouseMonthlyIncome'].'</td>
                        </tr>
                        <tr>
                            <td><strong>SSN:</strong></td>
                            <td>'.$row['SSN'].'</td>
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
                            <td>'.$row['PresentLandlordFirstName'].'</td>
                            <td><strong>Present Landlord&#39;s Last Name:</strong></td>
                            <td>'.$row['PresentLandlordLastName'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Present Landlord&#39;s Phone Number:</strong></td>
                            <td>'.$row['PresentLandlordPhone'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Former Landlord&#39;s First Name:</strong></td>
                            <td>'.$row['FormerLandlordFirstName'].'</td>
                            <td><strong>Former Landlord&#39;s Last Name:</strong></td>
                            <td>'.$row['FormerLandlordLastName'].'</td>
                        </tr>
                       <tr>
                            <td><strong>Former Landlord&#39;s Phone Number:</strong></td>
                            <td>'.$row['FormerLandlordPhone'].'</td>
                      </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Employment Information</th>
                        </tr>
                        <tr>
                            <td><strong>Current Employer:</strong></td>
                            <td>'.$row['CurrentEmployer'].'</td>
                            <td><strong>Current Employer&#39;s Phone Number:</strong></td>
                            <td>'.$row['EmployerPhone'].'</td>
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
                            <td>'.$row['PersonalReferenceName'].'</td>
                            <td><strong>Personal Reference&#39;s Phone Number:</strong></td>
                            <td>'.$row['PersonalReferencePhone'].'</td>
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
                    }      
                    mysql_close($con);           
                    ?>
              
            </section>
        </article>

        <?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
