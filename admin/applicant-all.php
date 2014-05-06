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
                $num_rows = mysql_num_rows($result);
                echo'
                <h3>Total Applications: '.$num_rows.'</h3>
                <table>
                    <tr>
                        <th colspan="5">Applications</th>
                    </tr>
                    <tr>
                        <th>Date Applied</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Monthly Income</th>
                        <th>Options</th>
                    </tr>';

                while($row = mysql_fetch_array($result)){

$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption //password for encryption
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
                        <td><form action="applicant-full.php" method="post">
                        <input type="hidden" name="ApplicationID" value="'.$row['ApplicationID'].'">
                        <input value="See More" type="submit" class="button">
                        </form></td>
                    </tr>';
                  }
                echo'<tr>
                        <td colspan="5" class="break">&nbsp;</td>
                    </tr>
                    </table>';
                                    
                mysql_close($con);
                ?>
    <?php include "footer.php"; ?>
    </div>

</body>
</html>
