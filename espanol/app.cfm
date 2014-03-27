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
                <p>If  you are in renting a unit within our residential properties, please fill out  the application below or print out and mail in <a href="../application.pdf" target="_blank">this form</a>. Upon completion, we will maintain in contact and  schedule a showing. If you are a business owner and are interested in renting a  commercial property, please contact us at <a href="mailto:email@example.com">email@example.com</a> for property inquiries. </p>
               

            <section id="applicationform">
                <form method="post" action="app-action.cfm" >
                    <table>
                        <tr>
                          <td colspan="4"> 
                           <cfoutput>
                          <input name="AppDate" id="AppDate" type="hidden" value="#DateFormat(Now(), 'm/dd/yyyy')#"></td>
                          </cfoutput>
                        </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Personal Information</th>
                        </tr>
                        <tr>
                            <td><strong>First Name of Applicant*:</strong></td>
                            <td><input name="ApplicantFirstName" id="ApplicantFirstName" required  ></td>
                            <td><strong>Last Name of Applicant*:</strong></td>
                            <td><input name="ApplicantLastName" id="ApplicantLastName" required  ></td>
                        </tr>
                        <tr>
                            <td><strong>Present Address*:</strong></td>
                            <td colspan="3"><input name="PresentStAddress" id="PresentStAddress" required  ></td>
                        </tr>
                        <tr>
                            <td><strong>Present City*:</strong></td>
                            <td><input name="PresentCity" id="PresentCity" required  ></td>
                            <td><strong>Present State*:</strong></td>
                            <td><select name="PresentState"  required  >
                                <option>Select a State</option>
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
                        <tr>
                        <tr>
                            <td><strong>Present Zip*:</strong></td>
                            <td><input name="PresentZIP" id="PresentZIP" required  ></td>
                            <td><strong>Present Phone Number*:</strong></td>
                            <td><input name="Phone" id="Phone" required  ></td>
                        <tr>
                        <tr>
                            <td><strong>Are You Married*:</strong></td>
                            <td><input name="Married" type="radio" value="Y" required>Yes <input name="Married" type="radio" value="N"required>No</td>
                                <td><strong>Spouse's Monthly Income:</strong></td>
                            <td><input name="SpouseMonthlyIncome" id="SpouseMonthlyIncome" ></td>
                        </tr>
                        <tr>
                            <td><strong>Social Security Number*:</strong></td>
                            <td><input name="SSN" id="SSN"required type="password" ></td>
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
                            <td><input name="PresentLandlordFirstName" id="PresentLandlordFirstName"></td>
                            <td><strong>Present Landlord's Last Name:</strong></td>
                            <td><input name="PresentLandlordLastName" id="PresentLandlordLastName"  ></td>
                        <tr>
                        <tr>
                            <td><strong>Present Landlord's Phone Number:</strong></td>
                            <td><input name="PresentLandlordPhone" id="PresentLandlordPhone"  ></td>
                        </tr>
                        <tr>
                            <td><strong>Former Landlord's First Name:</strong></td>
                            <td><input name="FormerLandlordFirstName" id="FormerLandlordFirstName" ></td>
                            <td><strong>Former Landlord's Last Name:</strong></td>
                            <td><input name="FormerLandlordLastName" id="FormerLandlordLastName" ></td>
                        <tr>
                       <tr>
                            <td><strong>Former Landlord's Phone Number:</strong></td>
                            <td><input name="FormerLandlordPhone" id="FormerLandlordPhone"></td>
                      </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Employment Information</th>
                        </tr>
                        <tr>
                            <td><strong>Current Employer*:</strong></td>
                            <td><input name="CurrentEmployer" id="CurrentEmployer" required  ></td>
                                <td><strong>Current Employer's Phone Number*:</strong></td>
                            <td><input name="EmployerPhone" id="EmployerPhone"  required ></td>
                        </tr>
                        <tr>
                            <td><strong>Job Title*:</strong></td>
                            <td><input name="JobTitle" id="JobTitle" required  ></td>
                                <td><strong>Monthly Income*: $</strong></td>
                            <td>
                              <input name="MonthlyIncome" id="MonthlyIncome" required  type="number" ></td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">References</th>
                        </tr>
                        <tr>
                            <td><strong>Personal Reference's Name*:</strong></td>
                            <td><input name="PersonalReferenceName" id="PersonalReferenceName" required  ></td>
                                <td><strong>Personal Reference's Phone Number*:</strong></td>
                            <td><input name="PersonalReferencePhone" id="PersonalReferencePhone" required  ></td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Additional Information</th>
                        </tr>
                        <tr>
                            <td><strong>Number of Cars*:</strong></td>
                            <td><select name="NumberofCars"  required  >
                            <cfloop from="0" to="10" index="i">
                                                                                                                                <cfoutput>
                                                <option value="#i#">#i#</option>
                                </cfoutput>
                            </cfloop>
                            </select></td>
                                <td><strong>Number of Pets*:</strong></td>
                            <td><select name="NumberofPets"  required  >
                            <cfloop from="0" to="10" index="i">
                                                                                                                                <cfoutput>
                                                <option value="#i#">#i#</option>
                                </cfoutput>
                            </cfloop>
                            </select></td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Submit" class="button"></td>
                            <td colspan="2"><input type="reset" value="Reset" class="button"></td>
                        </tr>
                    </table>

              </form>
              
                
            </section>
        </article>
<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
