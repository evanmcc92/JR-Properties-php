<!DOCTYPE html>

<html>
<head>
    <title>Commercial Properties - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<meta name="description" content="Descriptions and pictures of the commercial properties in Revere and Everett.">


    
</head>

<body>

    <div id="body">

    <?php include 'header.php'; ?>
                <h1>Commercial Properties</h1>
    
        <article>
                <p>Look below for descriptions and pictures of the commercial properties in our portfolio. We are currently looking to expand our commercial property management.</p>
                <section>
                
                <?php
					// Create connection
	                $con = mysql_connect('127.0.0.1:33067','root','');

	                // Check connection
	                if (mysqli_connect_errno()){
	                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	                }

					$db_selected = mysql_select_db("jrproper_jrproperties",$con);
					$sql = "SELECT * FROM CommercialUnits";
					$result = mysql_query($sql,$con);


					while($row = mysql_fetch_array($result)){

						$sqlproperty = "SELECT * FROM Properties WHERE PropertyID = '".$row['PropertyID']."';";
						$resultproperty = mysql_query($sqlproperty,$con);
						$rowproperty = mysql_fetch_array($resultproperty);

					    echo                '<table id="commercial-'.$row['UnitID'].'" class="residentlisting">';
					    echo                "<tr>";
					    echo                '<td width="295" rowspan="5">';
					    echo            	'<img src="img/'.$rowproperty['Photos'].'" alt="'.$row['Description'].'" width="275" />';
						echo					"</td>";
					    echo                     '<td width="325">'.$row['StreetAddress'].', '. $row['City'].'</td>';
					    echo                "</tr>";
					    echo                "<tr>";
					    echo                    '<td>'.$row['UnitName'].'</td>';
					    echo                "</tr>";
					    echo                "<tr>";
					    echo                    '<td>'.money_format("$%i",$row['MonthlyPrice']).' (monthly)</td>';
					    echo                "</tr>";
					    echo                "<tr>";
					    echo                    '<td>Date Available: '.$row['DateAvailable'].'</td>';
					    echo                "</tr>";
					    echo                "<tr>";
					    echo                    '<td>'.$row['Description'].'</td>';
					    echo                "</tr>";
					    echo            "</table>";
					}
									
                	mysqli_close($con); 
				?>
                </section>
        </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
