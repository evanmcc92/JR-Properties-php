<!DOCTYPE html>

<html>
<head>
    <title>Maintenance Requests - Admin - J&R Properties</title>
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
        <h1>Maintenance Requests</h1>
    <?php
                // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "select * from MaintenanceTickets;";

                $result = mysql_query($sql,$con);
                
                $num_rows = mysql_num_rows($result);


                echo'<h3>All Unresolved Requests Requests: '.$num_rows.'</h3>
                <table>
                        <tr>
                            <th colspan="6">Tickets</th>
                        </tr>
                        <tr>
                            <th>Date Filed</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Unit ID</th>
                            <th>Resolved</th>
                            <th>Options</th>
                        </tr>';

                while($row = mysql_fetch_array($result)){
                echo'<tr>
                        <td>'.$row['IssueDate'].'</td>
                        <td>'.$row['TenantLastName'].'</td>
                        <td>'.$row['TenantFirstName'].'</td>
                        <td>'.$row['UnitID'].'</td>
                        <td>'.$row['Resolved'].'</td>
                        <td><form action="ticket-full.php" method="post">
                            <input type="hidden" name="TicketID" value="'.$row['TicketID'].'">
                            <input value="See More" type="submit" class="button">
                        </form></td>
                    </tr>';
                  }
                echo'<tr>
                        <td colspan="6" class="break">&nbsp;</td>
                    </tr>
                </table>';
                mysql_close($con);
            ?>
    <?php include "footer.php"; ?>
    </div>

</body>
</html>
