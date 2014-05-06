<!DOCTYPE html>

<html>
<head>
    <title>Ticket Deleted - J&R Properties</title>
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
			width: 75%;
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

    <?php include "header.php"; ?>
<?php
                if(isset($_POST['TicketID'])){
                        
                        // Create connection
                        
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);


                $sql = "SELECT * FROM MaintenanceTickets where TicketID = ".mysql_real_escape_string($_POST['TicketID']);
                      
                $result = mysql_query($sql,$con);

                $row = mysql_fetch_array($result);
$key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; 
$dataTenantFirstName = base64_decode($row['TenantFirstName']);
$ivTenantFirstName = substr($dataTenantFirstName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataTenantLastName = base64_decode($row['TenantLastName']);
$ivTenantLastName = substr($dataTenantLastName, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$dataUnitID = base64_decode($row['UnitID']);
$ivUnitID = substr($dataUnitID, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));

$decryptedTenantFirstName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantFirstName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantFirstName),"\0");//script to decrypt
$decryptedTenantLastName = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataTenantLastName, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivTenantLastName),"\0");//script to decrypt
$decryptedUnitID = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataUnitID, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivUnitID),"\0");//script to decrypt

                echo '
                <h1>Ticket No. '.$row['TicketID'].'</h1>
    
        <article>
<h3>The following ticket has been deleted.</h3> 
               

            <section id="applicationform">
                    <p><a href="ticket-all.php">All Tickets</a></p>
                    <p>&nbsp;</p>
                    <table>
                        <tr>
                          <td colspan="4">'.$row['IssueDate'].'</td>
                      </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Ticket No. '.$row['TicketID'].'</th>
                        </tr>
                        <tr>
                            <td><b>First Name:</b></td>
                            <td>'.$decryptedTenantFirstName.'</td>
                            <td><strong>Last Name:</strong></td>
                            <td>'.$decryptedTenantLastName.'</td>
                        </tr>
                        <tr>
                            <td><strong>Unit ID:</strong></td>
                            <td>'.$decryptedUnitID.'</td>
                            <td><strong>Resolved:</strong></td>
                            <td>'.$row['Resolved'].'</td>
                        </tr>
                        <tr>
                                <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>Plumbing:</b></td>
                            <td>'.$row['Plumbing'].'</td>
                            <td><strong>Electric:</strong></td>
                            <td>'.$row['Electric'].'</td>
                        </tr>
                        <tr>
                            <td><b>Other:</b></td>
                            <td>'.$row['Other'].'</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                                <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>Description:</b></td>
                        </tr>
                        <tr>
                            <td colspan="4">'.$row['Description'].'</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                  </table>

              
            </section>
        </article>';
                $sql2 = 'DELETE FROM MaintenanceTickets where TicketID = '.mysql_real_escape_string($_POST['TicketID']);
                $result2 = mysql_query($sql2,$con);
                mysql_close($con);
            }
            ?>
    <?php include "footer.php"; ?>

  
    </div>

</body>
</html>