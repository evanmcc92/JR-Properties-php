<!DOCTYPE html>

<html>
<head>
    <title>All Properties - Admin - J&R Properties</title>
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
                $sql = "SELECT * FROM Properties";

                $result = mysql_query($sql,$con);
                
                $num_rows = mysql_num_rows($result);
                echo '
    
        <h1>Properties</h1>
       
            <h3>Total Number of Properties: '.$num_rows.'</h3>
            <h3><a href="property-add.php">Add New Property</a></h3>
            
            <table>
            	<tr>
                	<th colspan="7">Properties</th>
                </tr>
                <tr>
                	<th>Property ID</th>
                	<th>Street Address</th>
                	<th>City</th>
                	<th>Number of Units</th>
                	<th colspan="2">Options</th>
                </tr>
                ';
                
                while($row = mysql_fetch_array($result)){
                
                echo'
                <tr>
                	<td>'.$row['PropertyID'].'</td>
                	<td>'.$row['StreetAddress'].'</td>
                	<td>'.$row['City'].'</td>
                	<td>'.$row['NumberofUnits'].'</td>
                	<td><form action="property-full.php" method="post">
                    <input type="hidden" name="PropertyID" value="'.$row['PropertyID'].'">
                    <input value="See More" type="submit" class="button">
                    </form></td>
                	<td><form action="property-update.php" method="post">
                    <input type="hidden" name="PropertyID" value="'.$row['PropertyID'].'">
                    <input value="Edit" type="submit" class="button">
                    </form></td>
                </tr>
                ';
                }
                echo'
                <tr>
                    <td colspan="7" class="break">&nbsp;</td>
                </tr>
            </table>
        ';
        ?>
    <?php include "footer.php";?>
    </div>

</body>
</html>
