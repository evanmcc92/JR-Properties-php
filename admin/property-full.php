<!DOCTYPE html>

<html>
<head>
	<?php
	echo'
    <title>Property '.$_POST['PropertyID'].' - J&R Properties</title>
    ';
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

    <?php include "header.php";?>
    

                            
    <?php
    if(isset($_POST['PropertyID'])){
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "select * from Properties WHERE PropertyID = '".mysql_real_escape_string($_POST['PropertyID'])."';";

                $result = mysql_query($sql,$con);
                $row = mysql_fetch_array($result);
                echo'
                <h1>Property '.$row['PropertyID'].'</h1>
                
        <article>


            <section id="propertyform">
                	<p><form action="property-delete.php" method="post" id="delete-ticket">
                        <input type="hidden" name="PropertyID" value="'.$row['PropertyID'].'">
                        <input value="Delete" type="submit" class="button">
                	</form>
			</p>
                	<p><form action="property-update.php" method="post">
                    <input type="hidden" name="PropertyID" value="'.$row['PropertyID'].'">
                    <input value="Edit" type="submit" class="button">
                    </form></p>
                    <p><a href="property-all.php">All Properties</a></p>
                    <p>&nbsp;</p>
                
                    <table id="'.$row['PropertyID'].'">
                        <tr>
                                <th colspan="4">Property '.$row['PropertyID'].'</th>
                        </tr>
                        <tr>
                            <td><b>Street Address:</b></td>
                            <td>'.$row['StreetAddress'].'</td>
                            <td><strong>City:</strong></td>
                            <td>'.$row['City'].'</td>
                        </tr>
                        <tr>
                            <td><strong>State:</strong></td>
                            <td>'.$row['State'].'</td>
                            <td><strong>Property Type:</strong></td>
                            <td>'.$row['PropertyType'].'</td>
                        </tr>
                        <tr>
                            <td><b>Number of Units:</b></td>
                            <td>'.$row['NumberofUnits'].'</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                             <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                  </table>
                    </section>
              

              
            </section>
        </article>
';
}
?>
		<?php include "footer.php";?>

  
    </div>

</body>
</html>
