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
			padding: 5px 25px;
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
    <cfinclude template="header.cfm">
<cfquery datasource="team3" name="Application"> 
select * from Applications WHERE ApplicationID = #Form.ApplicationID#;
</cfquery>
<cfquery datasource="team3" name="DeleteApplication"> 
DELETE FROM Applications WHERE ApplicationID = #Form.ApplicationID#;
</cfquery>
    
        <h1>Applications</h1>
        <cfoutput query="Application">
            
<h3>The following application has been deleted.</h3> 
                    <p><a href="applicant-all.cfm">All Applications</a></p>
                    <table>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Personal Information</th>
                        </tr>
                        <tr>
                            <td><strong>First Name of Applicant:</strong></td>
                            <td>#ApplicantFirstName#</td>
                            <td><strong>Last Name of Applicant:</strong></td>
                            <td>#ApplicantLastName#</td>
                        </tr>
                        <tr>
                            <td><strong>Present Address:</strong></td>
                            <td colspan="3">#PresentStAddress#</td>
                        </tr>
                        <tr>
                            <td><strong>Present City:</strong></td>
                            <td>#PresentCity#</td>
                            <td><strong>Present State:</strong></td>
                            <td>#PresentState#</td>
                        </tr>
                        <tr>
                            <td><strong>Present Zip:</strong></td>
                            <td>#PresentZIP#</td>
                            <td><strong>Present Phone Number:</strong></td>
                            <td>#Phone#</td>
                        </tr>
                        <tr>
                            <td><strong>Are You Married:</strong></td>
                            <td>#Married#</td>
                                <td><strong>Spouse's Monthly Income:</strong></td>
                            <td>#SpouseMonthlyIncome#></td>
                        </tr>
                        <tr>
                            <td><strong>SSN:</strong></td>
                            <td>#SSN#</td>
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
                            <td>#PresentLandlordFirstName#</td>
                            <td><strong>Present Landlord's Last Name:</strong></td>
                            <td>#PresentLandlordLastName#</td>
                        </tr>
                        <tr>
                            <td><strong>Present Landlord's Phone Number:</strong></td>
                            <td>#PresentLandlordPhone#</td>
                        </tr>
                        <tr>
                            <td><strong>Former Landlord's First Name:</strong></td>
                            <td>#FormerLandlordFirstName#</td>
                            <td><strong>Former Landlord's Last Name:</strong></td>
                            <td>#FormerLandlordLastName#</td>
                        </tr>
                       <tr>
                            <td><strong>Former Landlord's Phone Number:</strong></td>
                            <td>#FormerLandlordPhone#</td>
                      </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Employment Information</th>
                        </tr>
                        <tr>
                            <td><strong>Current Employer:</strong></td>
                            <td>#CurrentEmployer#</td>
                                <td><strong>Current Employer's Phone Number:</strong></td>
                            <td>#EmployerPhone#</td>
                        </tr>
                        <tr>
                            <td><strong>Job Title:</strong></td>
                            <td>#JobTitle#</td>
                                <td><strong>Monthly Income:</strong></td>
                            <td>#DollarFormat(MonthlyIncome)#</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">References</th>
                        </tr>
                        <tr>
                            <td><strong>Personal Reference's Name:</strong></td>
                            <td>#PersonalReferenceName#</td>
                                <td><strong>Personal Reference's Phone Number:</strong></td>
                            <td>#PersonalReferencePhone#</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Additional Information</th>
                        </tr>
                        <tr>
                            <td><strong>Number of Cars:</strong></td>
                            <td>#NumberofCars#</td>
                            <td><strong>Number of Pets:</strong></td>
                            <td>#NumberofPets#</td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                    </table>
        </cfoutput>
    <cfinclude template="footer.cfm">
    </div>

</body>
</html>
