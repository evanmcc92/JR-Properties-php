<!DOCTYPE html>

<html>
<head>
    <?php echo '<title>Listing '.$_POST['UnitID'].'Deleted - J&R Properties</title>'; ?>
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
    <article>



        <section id="applicationform">
        <?php
            if(isset($_POST['UnitID'])){
                if(strpos($_POST['UnitID'],'R') !== false){
                    // Create connection
                    $con = mysql_connect('127.0.0.1:33067','root','');

                    // Check connection
                    if (mysqli_connect_errno()){
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $db_selected = mysql_select_db("jrproper_jrproperties",$con);

                    $sql = "SELECT * FROM ResidentialUnits where UnitID = '".mysql_real_escape_string($_POST['UnitID'])."'";
                          
                    $result = mysql_query($sql,$con);

                    $sql2 = 'DELETE FROM ResidentialUnits WHERE UnitID = "'.mysql_real_escape_string($_POST['UnitID']).'"';
                    $result2 = mysql_query($sql2,$con);

                    $row = mysql_fetch_array($result);

                    echo '<h1>Listing No. '.$row['UnitID'].' Has Been Deleted</h1>
                        <p><a href="listing-all.php">All Listings</a></p>
                        <p>&nbsp;</p>
                    
                        <table id="resident-'.$row['UnitID'].'" class="residentlisting">
                            <tr>
                                <td width="295" rowspan="4">
                                	<img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />
    							</td>
                                <td width="325">'.$row['StreetAddress'].', '.$row['City'].'</td>
                            </tr>
                            <tr>
                                <td>'.$row['UnitName'].'</td>
                            </tr>
                            <tr>
                                <td>'.money_format("$%i",$row['MonthlyPrice']).' (monthly)</td>
                            </tr>
                            <tr>
                                <td>Date Available: '.$row['DateAvailable'].'</td>
                            </tr>
                            <tr>
                                <td>'.$row['Description'].'</td>
                            </tr>
                        </table>';
                } else { 
                    // Create connection  
                    $con = mysql_connect('127.0.0.1:33067','root','');

                    // Check connection
                    if (mysqli_connect_errno()){
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $db_selected = mysql_select_db("jrproper_jrproperties",$con);

                    $sql = "SELECT * FROM CommercialUnits where UnitID = '".mysql_real_escape_string($_POST['UnitID'])."'";
                          
                    $result = mysql_query($sql,$con);

                    $row = mysql_fetch_array($result);

                    echo '<h1>Listing No. '.$row['UnitID'].' Has Been Deleted</h1>
                        <p><a href="listing-all.php">All Listings</a></p>
                        <p>&nbsp;</p>
                    
                        <table id="resident-'.$row['UnitID'].'" class="residentlisting">
                            <tr>
                                <td width="295" rowspan="4">
                                    <img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />
                                </td>
                                <td width="325">'.$row['StreetAddress'].', '.$row['City'].'</td>
                            </tr>
                            <tr>
                                <td>'.money_format('$%i',$row['MonthlyPrice']).' (monthly)</td>
                            </tr>
                            <tr>
                                <td>'.$row['NoBeds'].' Bed & '.$row['NoBaths'].' Bath</td>
                            </tr>
                            <tr>
                                <td>Date Available: '.$row['DateAvailable'].'</td>
                            </tr>
                            <tr>
                                <td>'.$row['Description'].'</td>
                            </tr>
                        </table>';
                    $sql2 = 'DELETE FROM CommercialUnits WHERE UnitID = "'.mysql_real_escape_string($_POST['UnitID']).'"';
                    $result2 = mysql_query($sql2,$con);
                }
            }
        ?>
          
        </section>

    </article>

	<?php include "footer.php"; ?>

  
    </div>

</body>
</html>
