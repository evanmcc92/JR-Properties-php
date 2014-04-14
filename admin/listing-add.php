<!DOCTYPE html>

<html>
<head>
    <title>Listing Added  - J&R Properties</title>
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
    <script>
	
		function commercialresidential() {
    			document.getElementById("commercialform").style.display = 'none';
    			document.getElementById("residentialform").style.display = 'none';
			var commercialresidential = prompt("Select Commercial or Residential");
			
			if (commercialresidential == "commercial") {
				//display none on residential
    			document.getElementById("commercialform").style.display = 'block';
			} else if (commercialresidential == "residential"){
				//display none on commercial
    			document.getElementById("residentialform").style.display = 'block';
			} else {
				prompt("Wrong Submission\nSelect Commercial or Residential");
			}
			
			
			
		}
	</script>
    
</head>

<body onLoad="commercialresidential()">


    <div id="body">

    <?php include 'header.php'; ?>
                <h1>Add A Listing</h1>
    
        <article>
 
            <section id="residentialform">
                    <p><a href="listing-all.php">All Listings</a></p>

                    <form method="post" action="listing-add-action.php" enctype="multipart/form-data">
                    	<table>
                            <tr>
                                <th colspan="2">Residential Listing</th>
                            </tr>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td><input name="UnitID" id="UnitID" type="text" required placeholder="Rxxx"></td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td><input name="UnitName" id="UnitName" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>Check if Vacant*:</strong></td>
                                <td><input name="Vacant" id="Vacant" type="checkbox" value="Yes" ></td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td><select name="PropertyID" id="PropertyID" type="text" >
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


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<option value="'.$row['PropertyID'].'">'.$row['PropertyID'].'</option>';
                      
                          }
                                            
                        ?>
                        </select></td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td><input name="StreetAddress" id="StreetAddress" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td><input name="City" id="City" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td><input name="State" id="State" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td><input name="DateAvailable" id="DateAvailable" type="text" placeholder="mm/dd/yyyy" ></td>
                            </tr>
                            <tr>
                                <td><strong>Number of Bedrooms:</strong></td>
                                <td> <select name="NoBeds" id="NoBeds">
                                          <option value="Studio">Studio</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4+">4+</option>
                            		</select></td>
                            </tr>
                            <tr>
                        		<td><strong>Number of Bathrooms:</strong></td>
                                <td><select name="NoBaths" id="NoBaths">
                                        <option value="1/2">1/2</option>
                                        <option value="1">1</option>
                                        <option value="1 1/2">1 1/2</option>
                                        <option value="2+">2+</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td><input name="MonthlyPrice" id="MonthlyPrice" type="text" placeholder="xx.xx"></td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td><textarea name="Description" id="Description" ></textarea></td>
                            </tr>
                            <tr>
                                <td><strong>Photo</strong></td>
                                <td><input type="file" name="Photos" id="Photos"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" class="button"></td>
                            </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                    
                    
                    </form>
              
            </section>
            <section id="commercialform">
            		
                    <p><a href="listing-all.php">All Listings</a></p>
                    <form method="post" action="listing-add-action.php" enctype="multipart/form-data">
                    	<table>
                            <tr>
                                <th colspan="2">Commercial Listing</th>
                            </tr>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td><input name="UnitID" id="UnitID" type="text" required placeholder="Cxxx"></td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td><input name="UnitName" id="UnitName" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>Check if Vacant*:</strong></td>
                                <td><input name="Vacant" id="Vacant" type="checkbox" value="Yes" ></td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td><select name="PropertyID" id="PropertyID" type="text" >
                                <?php
                        // Create connection
                                $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno())
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT PropertyID FROM Properties";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<option value="'.$row['PropertyID'].'">'.$row['PropertyID'].'</option>';
                      
                          }
                                            
                        ?>
                        </select></td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td><input name="StreetAddress" id="StreetAddress" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td><input name="City" id="City" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td><input name="State" id="State" type="text" ></td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td><input name="DateAvailable" id="DateAvailable" type="text" placeholder="mm/dd/yyyy" ></td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td><input name="MonthlyPrice" id="MonthlyPrice" type="text" placeholder="xx.xx"></td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td><textarea name="Description" id="Description" ></textarea></td>
                            </tr>
                            <tr>
                                <td><strong>Photo</strong></td>
                                <td><input type="file" name="Photos" id="Photos"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" class="button"></td>
                            </tr>
                    <tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                    </form>
              
            </section>
        </article>

    <?php include 'footer.php'; ?>

  
    </div> 

</body>
</html>
