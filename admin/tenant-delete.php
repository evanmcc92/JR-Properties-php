<!DOCTYPE html>

<html>
<head>
    <?php
        echo '<title>Tenant '.$_POST['TenantID'].' Deleted - J&R Properties</title>';
    ?>
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
			margin: 0 auto 20px;
		}
		td, th {
			padding:5px;
		}
	</style>
    
</head>

<body>


    <div id="body">

    <?php include "header.php"; ?>
    <?php
                if(isset($_POST['TenantID'])){
                        
                        // Create connection
                        
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);


                $sql = "SELECT * FROM Tenants where TenantID = '".mysql_real_escape_string($_POST['TenantID'])."'";
                      
                $result = mysql_query($sql,$con);

                $row = mysql_fetch_array($result);

                echo '
                <h1>Tenant '.$row['TenantID'].' Has Been Deleted</h1>


            <section id="tenantform">
                    <p><a href="tenant-all.php">All Tenants</a></p>
                    <p>&nbsp;</p>
                
                    <table id="'.$row['TenantID'].'">
                        <tr>
                            <th colspan="4">Tenant '.$row['TenantID'].'</th>
                        </tr>
                        <tr>
                            <td><b>First Name:</b></td>
                            <td>'.$row['TenantFirstName'].'</td>
                            <td><strong>Last Name:</strong></td>
                            <td>'.$row['TenantLastName'].'</td>
                        </tr>
                        <tr>
                            <td><strong>Phone Number:</strong></td>
                            <td>'.$row['TenantPhone'].'</td>
                            <td><strong>Unit ID:</strong></td>
                            <td>'.$row['UnitID'].'</td>
                        </tr>
                        <tr>
                            <td><b>Monthly Rent:</b></td>
                            <td>'.money_format("$%i",$row['MonthlyRent']).'</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>Lease Start:</b></td>
                            <td>'.$row['LeaseStart'].'</td>
                            <td><b>Lease End:</b></td>
                            <td>'.$row['LeaseEnd'].'</td>
                        </tr>
                        <tr>
                             <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                  </table>
                    </section>';
                $sql2 = 'DELETE FROM Tenants WHERE TenantID  = "'.mysql_real_escape_string($_POST['TenantID']).'"';
                $result2 = mysql_query($sql2,$con);
                mysql_close($con);
            }
            ?>
              
        </article>

    <?php include "footer.php"; ?>

  
    </div>

</body>
</html>
