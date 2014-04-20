
<!DOCTYPE html>

<html>
<head>
    <title>Admin - J&R Properties</title>
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
	</style>
</head>

<body>
    <div id="body">

    <?php include "header.php"; ?>
    
        <h1>Admin Section</h1>
        <article>
        	<section id="applications-admin">
            <?php
                // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }


                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "select * from Applications ORDER BY AppDate DESC;";
                $result = mysql_query($sql,$con);
                echo'<h3>Recent Applications</h3>
                <table>
                    <tr>
                        <th colspan="4">Applications</th>
                    </tr>
                    <tr>
                        <th>Date Applied</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Monthly Income</th>
                    </tr>';

                while($row = mysql_fetch_array($result)){

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$dataApplicantFirstName = base64_decode($row['ApplicantFirstName']);
$ivApplicantFirstName = substr($dataApplicantFirstName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataApplicantLastName = base64_decode($row['ApplicantLastName']);
$ivApplicantLastName = substr($dataApplicantLastName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedApplicantFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataApplicantFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivApplicantFirstName),"\0");//script to decrypt
$decryptedApplicantLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataApplicantLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivApplicantLastName),"\0");//script to decrypt
                echo'<tr>
                        <td>'.$row['AppDate'].'</td>
                        <td>'.$decryptedApplicantLastName.'</td>
                        <td>'.$decryptedApplicantFirstName.'</td>
                        <td>'.money_format("$%i",$row['MonthlyIncome']).'</td>
                    </tr>';
                  }
                echo'<tr>
                        <td colspan="4" class="break">&nbsp;</td>
                    </tr>
                    </table>';
                                    
                mysql_close($con);
                ?>
        		
                <p><a href="applicant-all.php">See all applicants here</a></p>
            </section>
        	<section id="maintenance-admin">
            <?php
                // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "select * from MaintenanceTickets ORDER BY IssueDate DESC;";
                $result = mysql_query($sql,$con);
                echo'<h3>Recent Maintenance Requests</h3>
                <table>
                        <tr>
                            <th colspan="5">Tickets</th>
                        </tr>
                        <tr>
                            <th>Date Filed</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Unit ID</th>
                            <th>Resolved</th>
                        </tr>';

                while($row = mysql_fetch_array($result)){
                    $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption
$dataTenantFirstName = base64_decode($row['TenantFirstName']);
$ivTenantFirstName = substr($dataTenantFirstName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataTenantLastName = base64_decode($row['TenantLastName']);
$ivTenantLastName = substr($dataTenantLastName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataUnitID = base64_decode($row['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedTenantFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantFirstName),"\0");//script to decrypt
$decryptedTenantLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantLastName),"\0");//script to decrypt
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt

                echo'<tr>
                        <td>'.$row['IssueDate'].'</td>
                        <td>'.$decryptedTenantLastName.'</td>
                        <td>'.$decryptedTenantFirstName.'</td>
                        <td>'.$decryptedUnitID.'</td>
                        <td>'.$row['Resolved'].'</td>
                    </tr>';
                  }
                echo'<tr>
                        <td colspan="5" class="break">&nbsp;</td>
                    </tr>
                </table>';
                                    
                mysql_close($con);
                ?>
                	<p><a href="ticket-all.php">See all requests here</a></p>
            </section>
        	<section id="listings-admin">
               <?php
                // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT UnitID FROM ResidentialUnits
                UNION
                SELECT UnitID FROM CommercialUnits;";
                $result = mysql_query($sql,$con);
                $num_rows = mysql_num_rows($result);
                echo'
                <h3>Total Listings</h3>
                <p>Total Listings: <a href="listing-all.php">'.$num_rows.'</a></p>';
                                    
                mysql_close($con);
                ?>
            </section>
            <section id="finances-admin">
                <h3>Monthly Incomes</h3><?php
                // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);


                $CommercialAll = mysql_query('SELECT SUM(MonthlyPrice) AS CommercialAll FROM CommercialUnits'); 
                $row = mysql_fetch_assoc($CommercialAll); 
                $commercialall = $row['CommercialAll'];

                echo'
                <!-- commercial total -->
                
                <p>Max Income for Commercial Units: '.money_format("$%i",$commercialall).'</p>';

                $commercialvacanttotal = mysql_query('SELECT sum(MonthlyPrice) as commercialvacanttotal FROM CommercialUnits WHERE Vacant="No"'); 
                $row = mysql_fetch_assoc($commercialvacanttotal); 
                $commercialvacant = $row['commercialvacanttotal'];

                echo'<!-- commercial total where vacant = false-->
                    <p>Current Monthly Commercial Revenue: '.money_format("$%i",$commercialvacant).'</p>
                    <p>&nbsp;</p>';

                $ResidentialAll = mysql_query('SELECT SUM(MonthlyPrice) AS ResidentialAll FROM ResidentialUnits'); 
                $row = mysql_fetch_assoc($ResidentialAll); 
                $residentialall = $row['ResidentialAll'];

                echo'
                <!-- commercial total -->
                
                <p>Max Income for Residential Units: '.money_format("$%i",$residentialall).'</p>';

                $residentialvacanttotal = mysql_query('SELECT sum(MonthlyPrice) as residentialvacanttotal FROM ResidentialUnits WHERE Vacant="No"'); 
                $row = mysql_fetch_assoc($residentialvacanttotal); 
                $residentialvacant = $row['residentialvacanttotal'];

                echo'<!-- commercial total where vacant = false-->
                    <p>Current Monthly Residential Revenue: '.money_format("$%i",$residentialvacant).'</p>
                    <p>&nbsp;</p>';
                mysql_close($con);
                ?>
            </section>
        </article>
    <?php include "footer.php"; ?>
        </div>

</body>
</html>
