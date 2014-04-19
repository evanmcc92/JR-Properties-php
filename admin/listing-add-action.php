<!DOCTYPE html>

<html>
<head>
    <title>Listing Added - J&R Properties</title>
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
                <h1>Listing</h1>
    
        <article>
            <h3>Listing Added</h3>
 
            <section id="listingform">
            <?php
                if(isset($_POST['UnitID'])){
                    if(strpos($_POST['UnitID'],'R') !== false){
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        

                        $allowedExts = array("gif", "jpeg", "jpg", "png");
                        $temp = explode(".", $_FILES["Photos"]["name"]);
                        $picname = $_FILES["Photos"]["name"];
                        $extension = end($temp);
                        if ((($_FILES["Photos"]["type"] == "image/gif")
                            || ($_FILES["Photos"]["type"] == "image/jpeg")
                            || ($_FILES["Photos"]["type"] == "image/jpg")
                            || ($_FILES["Photos"]["type"] == "image/pjpeg")
                            || ($_FILES["Photos"]["type"] == "image/x-png")
                            || ($_FILES["Photos"]["type"] == "image/png"))
                            && ($_FILES["Photos"]["size"] < 20000)
                            && in_array($extension, $allowedExts)){
                            if ($_FILES["Photos"]["error"] > 0){
                                echo "Return Code: " . $_FILES["Photos"]["error"] . "<br>";
                            }else{
                                if (file_exists("../img/" . $_FILES["Photos"]["name"])){
                                    echo $_FILES["Photos"]["name"] . " already exists. ";
                                }else{
                                    move_uploaded_file($_FILES["Photos"]["tmp_name"],
                                    "../img/" . $_FILES["Photos"]["name"]);
                                    echo "Stored in: " . "../img/" . $_FILES["file"]["name"];
                                }
                            }
                        }else{
                            echo "Invalid file";
                        }


                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO ResidentialUnits
                                (UnitID,UnitName,PropertyID,StreetAddress,City,State,DateAvailable,Description,NoBeds,MonthlyPrice,NoBaths,Photos,Vacant)
                                VALUES('$_POST[UnitID]', '$_POST[UnitName]', '$_POST[PropertyID]', '$_POST[StreetAddress]', '$_POST[City]', '$_POST[State]', '$_POST[DateAvailable]', '$_POST[Description]', '$_POST[NoBeds]', '$_POST[MonthlyPrice]', '$_POST[NoBaths]', '$picname','$_POST[Vacant]');";

                        $result = mysql_query($sql,$con);

                        echo '
                            <p><a href="listing-all.php">All Listings</a></p>
                                <table>
                                    <tr>
                                        <th colspan="2">Residential Listing</th>
                                    </tr>
                                    <tr>
                                        <td><strong>Unit ID*:</strong></td>
                                        <td>'.$_POST['UnitID'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Unit Name:</strong></td>
                                        <td>'.$_POST['UnitName'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Property ID*:</strong></td>
                                        <td>'.$_POST['PropertyID'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Street Address*:</strong></td>
                                        <td>'.$_POST['StreetAddress'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City*:</strong></td>
                                        <td>'.$_POST['City'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>State*:</strong></td>
                                        <td>'.$_POST['State'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date Available*:</strong></td>
                                        <td>'.$_POST['DateAvailable'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Bedrooms:</strong></td>
                                        <td>'.$_POST['NoBeds'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Bathrooms:</strong></td>
                                        <td>'.$_POST['NoBaths'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monthly Price*:</strong></td>
                                        <td>'.$_POST['MonthlyPrice'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description*:</strong></td>
                                        <td>'.$_POST['Description'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Photos</strong></td>
                                        <td><img src="../img/'.$picname .'"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="break">&nbsp;</td>
                                    </tr>
                                </table>';

                    } else {


                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        

                        $allowedExts = array("gif", "jpeg", "jpg", "png");
                        $temp = explode(".", $_FILES["Photos"]["name"]);
                        $picname = $_FILES["Photos"]["name"];
                        $extension = end($temp);
                        if ((($_FILES["Photos"]["type"] == "image/gif")
                            || ($_FILES["Photos"]["type"] == "image/jpeg")
                            || ($_FILES["Photos"]["type"] == "image/jpg")
                            || ($_FILES["Photos"]["type"] == "image/pjpeg")
                            || ($_FILES["Photos"]["type"] == "image/x-png")
                            || ($_FILES["Photos"]["type"] == "image/png"))
                            && ($_FILES["Photos"]["size"] < 20000)
                            && in_array($extension, $allowedExts)){
                            if ($_FILES["Photos"]["error"] > 0){
                                echo "Return Code: " . $_FILES["Photos"]["error"] . "<br>";
                            }else{
                                if (file_exists("../img/" . $_FILES["Photos"]["name"])){
                                    echo $_FILES["Photos"]["name"] . " already exists. ";
                                }else{
                                    move_uploaded_file($_FILES["Photos"]["tmp_name"],
                                    "../img/" . $_FILES["Photos"]["name"]);
                                    echo "Stored in: " . "../img/" . $_FILES["file"]["name"];
                                }
                            }
                        }else{
                            echo "Invalid file";
                        }


                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO CommercialUnits
                                (UnitID,UnitName,PropertyID,StreetAddress,City,State,DateAvailable,Description,MonthlyPrice,Photos,Vacant)
                                VALUES('$_POST[UnitID]', '$_POST[UnitName]', '$_POST[PropertyID]', '$_POST[StreetAddress]', '$_POST[City]', '$_POST[State]', '$_POST[DateAvailable]', '$_POST[Description]', '$_POST[MonthlyPrice]', '$picname','$_POST[Vacant]');";

                        $result = mysql_query($sql,$con);

                            echo '
                            <p><a href="listing-all.php">All Listings</a></p>
                                <table>
                                    <tr>
                                        <th colspan="2">Commercial Listing</th>
                                    </tr>
                                    <tr>
                                        <td><strong>Unit ID*:</strong></td>
                                        <td>'.$_POST['UnitID'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Unit Name:</strong></td>
                                        <td>'.$_POST['UnitName'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Property ID*:</strong></td>
                                        <td>'.$_POST['PropertyID'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Street Address*:</strong></td>
                                        <td>'.$_POST['StreetAddress'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City*:</strong></td>
                                        <td>'.$_POST['City'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>State*:</strong></td>
                                        <td>'.$_POST['State'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date Available*:</strong></td>
                                        <td>'.$_POST['DateAvailable'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monthly Price*:</strong></td>
                                        <td>'.$_POST['MonthlyPrice'].'</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description*:</strong></td>
                                        <td>'.$_POST['Description'].'</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Photos</strong></td>
                                    	<td><img src="../img/'.$picname .'"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="break">&nbsp;</td>
                                    </tr>
                                </table>';
                    }
                }
            ?>
              
            </section>
        </article>

    <?php include "footer.php"; ?>

  
    </div> 

</body>
</html>