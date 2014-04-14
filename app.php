<!DOCTYPE html>

<html>
<head>
    <title>Application - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="description" content="J&R Properties application for residential tenants.">
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
                <p>If you are in renting a unit within our residential properties, please fill out the application below or print out and mail in <a href="application.pdf" target="_blank">this form</a>. Upon completion, we will maintain in contact and schedule a showing. If you are a business owner and are interested in renting a commercial property, please contact us at <a href="mailto:email@example.com">email@example.com</a> for property inquiries.</p>
               <?php 
                    // $key = 'password to (en/de)crypt';
                    // $string = ' string to be encrypted '; // note the spaces

                    // $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM);

                    // $encrypted = base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),$string,MCRYPT_MODE_CBC,$iv));

                    // $data = base64_decode($encrypted);
                    // $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

                    // $decrypted = rtrim(
                    //     mcrypt_decrypt(
                    //         MCRYPT_RIJNDAEL_256,
                    //         hash('sha256', $key, true),
                    //         substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),
                    //         MCRYPT_MODE_CBC,
                    //         $iv
                    //     ),
                    //     "\0"
                    // );

                    // echo 'Encrypted:' . "\n";
                    // var_dump($encrypted); // "ey7zu5zBqJB0rGtIn5UB1xG03efyCp+KSNR4/GAv14w="

                    // echo "\n";

                    // echo 'Decrypted:' . "\n";
                    // var_dump($decrypted); // " string to be encrypted "

//                $arr_value = array("apple","orange","pepper","bella");

// function encrypt($text)
// {
//    return base64_encode($text);
// }

// function decrypt($text)
// {
//    return base64_decode($text);
// }

// $encrypted = array_map("encrypt", $arr_value);
// echo '<pre>';
// print_r($encrypted);

// $decrypted = array_map("decrypt", $arr_value);
// echo '<pre>';
// print_r($decrypted);

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$string = ' string to be encrypted ';
$iv = mcrypt_create_iv(
    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),
    MCRYPT_DEV_URANDOM
); //used to add more randomness to the encryption process

$encrypted = base64_encode(
    $iv .
    mcrypt_encrypt(
        MCRYPT_RIJNDAEL_256,
        hash('sha256', $key, true),
        $string,
        MCRYPT_MODE_CBC,
        $iv
    )
); //script to encrypt
$data = base64_decode($encrypted);
$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decrypted = rtrim(
    mcrypt_decrypt(
        MCRYPT_RIJNDAEL_256,
        hash('sha256', $key, true),
        substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),
        MCRYPT_MODE_CBC,
        $iv
    ),
    "\0"
);//script to decrypt


echo 'Encrypted:' . "\n";
var_dump($encrypted);

echo "\n";

echo 'Decrypted:' . "\n";
var_dump($decrypted);


               ?>

            <section id="applicationform">
                <form method="post" action="app-action.php" >
                    <table>
                        <tr>
                          <td colspan="4"> 
                           <cfoutput>
                          <input name="AppDate" id="AppDate" type="hidden" value="<?php echo date("m/d/Y");?>"></td>
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
                            <td><input name="Married" type="radio" value="Yes" required>Yes <input name="Married" type="radio" value="No"required>No</td>
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
							<?php 
							  for ($x=0; $x<=5; $x++)
								 {
								 echo "<option value='$x'>$x</option>";
								 }
							?> 
                            </select></td>
                                <td><strong>Number of Pets*:</strong></td>
                            <td><select name="NumberofPets"  required  >
							<?php 
							  for ($x=0; $x<=5; $x++)
								 {
								 echo "<option value='$x'>$x</option>";
								 }
							?> 
                            </select></td>
                        </tr>
                        <tr>
                                <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="reset" value="Reset" class="button"></td>
                            <td colspan="2"><input type="submit" name="submit" value="Submit" class="button"></td>
                        </tr>
                    </table>

              </form>
              
                
            </section>
        </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
