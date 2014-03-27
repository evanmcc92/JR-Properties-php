<!DOCTYPE html>

<html>
<head>
    <title>Application - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

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

    <cfinclude template="header.cfm">
    
        <article>
                <h1>Application</h1>
                <p>Thank you for submitting your application. </p>
               

            <section id="applicationform">
    			<cfinsert datasource="team3" tablename="Applications" >
                <cfoutput>
                    <table>
                        <tr>
                          <td colspan="4">
                          #DATEFORMAT(Form.AppDate, "m/d/yyyy")#</td>
                        </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Personal Information</th>
                        </tr>
                        <tr>
                            <td><strong>First Name of Applicant:</strong></td>
                            <td>#Form.ApplicantFirstName#</td>
                            <td><strong>Last Name of Applicant:</strong></td>
                            <td>#Form.ApplicantLastName#</td>
                        </tr>
                        <tr>
                            <td><strong>Present Address:</strong></td>
                            <td colspan="3">#Form.PresentStAddress#</td>
                        </tr>
                        <tr>
                            <td><strong>Present City:</strong></td>
                            <td>#Form.PresentCity#</td>
                            <td><strong>Present State:</strong></td>
                            <td>#Form.PresentState#</td>
                        </tr>
                        <tr>
                            <td><strong>Present Zip:</strong></td>
                            <td>#Form.PresentZIP#</td>
                            <td><strong>Present Phone Number:</strong></td>
                            <td>#Form.Phone#</td>
                        </tr>
                        <tr>
                            <td><strong>Are You Married:</strong></td>
                            <td>#Form.Married#</td>
                                <td><strong>Spouse's Monthly Income:</strong></td>
                            <td>#Form.SpouseMonthlyIncome#></td>
                        </tr>
                        <tr>
                            <td><strong>SSN:</strong></td>
                            <td>#Form.SSN#</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Landlord Information</th>
                        </tr>
                        <tr>
                            <td><strong>Present Landlord's First Name:</strong></td>
                            <td>#Form.PresentLandlordFirstName#</td>
                            <td><strong>Present Landlord's Last Name:</strong></td>
                            <td>#Form.PresentLandlordLastName#</td>
                        </tr>
                        <tr>
                            <td><strong>Present Landlord's Phone Number:</strong></td>
                            <td>#Form.PresentLandlordPhone#</td>
                        </tr>
                        <tr>
                            <td><strong>Former Landlord's First Name:</strong></td>
                            <td>#Form.FormerLandlordFirstName#</td>
                            <td><strong>Former Landlord's Last Name:</strong></td>
                            <td>#Form.FormerLandlordLastName#</td>
                        </tr>
                       <tr>
                            <td><strong>Former Landlord's Phone Number:</strong></td>
                            <td>#Form.FormerLandlordPhone#</td>
                      </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Employment Information</th>
                        </tr>
                        <tr>
                            <td><strong>Current Employer:</strong></td>
                            <td>#Form.CurrentEmployer#</td>
                                <td><strong>Current Employer's Phone Number:</strong></td>
                            <td>#Form.EmployerPhone#</td>
                        </tr>
                        <tr>
                            <td><strong>Job Title:</strong></td>
                            <td>#Form.JobTitle#</td>
                                <td><strong>Monthly Income:</strong></td>
                            <td>#DollarFormat(Form.MonthlyIncome)#</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">References</th>
                        </tr>
                        <tr>
                            <td><strong>Personal Reference's Name:</strong></td>
                            <td>#Form.PersonalReferenceName#</td>
                                <td><strong>Personal Reference's Phone Number:</strong></td>
                            <td>#Form.PersonalReferencePhone#</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Additional Information</th>
                        </tr>
                        <tr>
                            <td><strong>Number of Cars:</strong></td>
                            <td>#Form.NumberofCars#</td>
                            <td><strong>Number of Pets:</strong></td>
                            <td>#Form.NumberofPets#</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                    </table>

              </cfoutput>
              
            </section>
        </article>

		<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
