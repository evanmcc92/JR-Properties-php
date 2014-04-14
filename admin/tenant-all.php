<!DOCTYPE html>

<html>
<head>
    <title>All Tentants - Admin - J&R Properties</title>
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
    
        <?php
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM Tenants";

                $result = mysql_query($sql,$con);
                
                $num_rows = mysql_num_rows($result);


                echo' <h1>Tenants</h1>
            <h3>Total Number of Tenants: '.$num_rows.'</h3>
            <h3><a href="tenant-add.php">Add New Tenant</a></h3>
            
            <table>
            	<tr>
                	<th colspan="7">Tenants</th>
                </tr>
                <tr>
                	<th>Tenant ID</th>
                	<th>First Name</th>
                	<th>Last Name</th>
                	<th>Phone Number</th>
                	<th colspan="2">Options</th>
                </tr>';

                while($row = mysql_fetch_array($result)){
                echo'
                <tr>
                	<td>'.$row['TenantID'].'</td>
                	<td>'.$row['TenantFirstName'].'</td>
                	<td>'.$row['TenantLastName'].'</td>
                	<td>'.$row['TenantPhone'].'</td>
                	<td><form action="tenant-full.php" method="post">
                        <input type="hidden" name="TenantID" value="'.$row['TenantID'].'">
                        <input value="See More" type="submit" class="button">
                    </form></td>
                	<td><form action="tenant-update.php" method="post">
                        <input type="hidden" name="TenantID" value="'.$row['TenantID'].'">
                        <input value="Edit" type="submit" class="button">
                    </form></td>
                </tr>';
                  }
                echo'
                <tr>
                    <td colspan="7" class="break">&nbsp;</td>
                </tr>
            </table>';
                mysql_close($con);
            ?>
    <?php include "footer.php"; ?>
    </div>

</body>
</html>
