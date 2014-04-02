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
                echo'<tr>
                        <td>'.$row['AppDate'].'</td>
                        <td>'.$row['ApplicantLastName'].'</td>
                        <td>'.$row['ApplicantFirstName'].'</td>
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
                echo'<tr>
                        <td>'.$row['IssueDate'].'</td>
                        <td>'.$row['TenantLastName'].'</td>
                        <td>'.$row['TenantFirstName'].'</td>
                        <td>'.$row['UnitID'].'</td>
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
        </article>
    <?php include "footer.php"; ?>
        </div>

</body>
</html>
