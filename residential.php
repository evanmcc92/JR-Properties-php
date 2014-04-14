<!DOCTYPE html>

<html>
<head>
    <title>Residental Properties - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<meta name="description" content="Managing residential properties is our specialty since 1987. We provide quality apartments in Everett, Lynn, Chelsea and Revere.">
<style>
	.top{
		
float: right;
margin-top: -41px;
padding-right: 23px;}
</style>
    
</head>

<body>
    <div id="body">

        
    <?php include 'header.php'; ?>
                <h1>Residential Properties</h1>
    
        <article>
            <section id="article">
                <p>Managing residential properties is our specialty since 1987. We provide quality apartments in Everett, Lynn, Chelsea and Revere. The listings below provide you with unit and availability information. If a unit has a date available of TAW (also known as tenant at will), please fill out an application and call us to indicate your interest. As soon as the unit becomes available, which can be within the next 30 days, we will contact you.</p>
                <section id="chelsea">
                    <h4>Chelsea</h4>
                    <p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Chelsea'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result)){

                        $sqlproperty = "SELECT * FROM Properties WHERE PropertyID = '".$row['PropertyID']."';";
                        $resultproperty = mysql_query($sqlproperty,$con);
                        $rowproperty = mysql_fetch_array($resultproperty);

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="img/'.$rowproperty['Photos'].'" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].', '. $row['City'].'</td>';
                            echo                "</tr>";
                            echo                "<tr>";
                            echo                    '<td>'.$row['NoBeds'].' Bedrooms, '.$row['NoBaths'].' Bathrooms</td>';
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
                <section id="everett">
                    <h4>Everett</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Everett'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result)){

                        $sqlproperty = "SELECT * FROM Properties WHERE PropertyID = '".$row['PropertyID']."';";
                        $resultproperty = mysql_query($sqlproperty,$con);
                        $rowproperty = mysql_fetch_array($resultproperty);

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="img/'.$rowproperty['Photos'].'" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].', '. $row['City'].'</td>';
                            echo                "</tr>";
                            echo                "<tr>";
                            echo                    '<td>'.$row['NoBeds'].' Bedrooms, '.$row['NoBaths'].' Bathrooms</td>';
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
                <section id="lynn">
                    <h4>Lynn</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Lynn'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result)){

                        $sqlproperty = "SELECT * FROM Properties WHERE PropertyID = '".$row['PropertyID']."';";
                        $resultproperty = mysql_query($sqlproperty,$con);
                        $rowproperty = mysql_fetch_array($resultproperty);

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="img/'.$rowproperty['Photos'].'" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].', '. $row['City'].'</td>';
                            echo                "</tr>";
                            echo                "<tr>";
                            echo                    '<td>'.$row['NoBeds'].' Bedrooms, '.$row['NoBaths'].' Bathrooms</td>';
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
                <section id="revere">
                    <h4>Revere</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Revere'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result)){

                        $sqlproperty = "SELECT * FROM Properties WHERE PropertyID = '".$row['PropertyID']."';";
                        $resultproperty = mysql_query($sqlproperty,$con);
                        $rowproperty = mysql_fetch_array($resultproperty);

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="img/'.$rowproperty['Photos'].'" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].', '. $row['City'].'</td>';
                            echo                "</tr>";
                            echo                "<tr>";
                            echo                    '<td>'.$row['NoBeds'].' Bedrooms, '.$row['NoBaths'].' Bathrooms</td>';
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
            </section>

            <section id="aside">
                <ul>
                    <li><a href="#chelsea">Chelsea</a></li>
                    <li><a href="#everett">Everett</a></li>
                    <li><a href="#lynn">Lynn</a></li>
                    <li><a href="#revere">Revere</a></li>
                </ul>
            </section>
        </article>
        
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
