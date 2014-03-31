<!DOCTYPE html>

<html>
<head>
    <title>Residental Properties - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
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
                <h1>Propiedades Residenciales</h1>
    
        <article>
            <section id="article">
                <p>La gesti&oacute;n de propiedades residenciales es nuestra especialidad desde 1987. Ofrecemos apartamentos de calidad en Everett, Lynn, Chelsea y Revere. </p>
                <section id="chelsea">
                    <h4>Chelsea</h4>
                    <p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno())
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Chelsea'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].','. $row['City'].'</td>';
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
                                            
                        mysql_close($con);
                        ?>

                </section>
                <section id="everett">
                    <h4>Everett</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno())
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Everett'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].','. $row['City'].'</td>';
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
                                            
                        mysql_close($con);
                        ?>
                </section>
                <section id="lynn">
                    <h4>Lynn</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno())
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Lynn'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].','. $row['City'].'</td>';
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
                                            
                        mysql_close($con);
                        ?>
                </section>
                <section id="revere">
                    <h4>Revere</h4><p class="top"><a href="#top">Top</a></p>
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno())
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM ResidentialUnits where city = 'Revere'";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<table id="resident-'.$row['UnitID'].'" class="residentlisting">';
                            echo                "<tr>";
                            echo                '<td width="295" rowspan="5">';
                            echo                '<img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />';
                            echo                    "</td>";
                            echo                     '<td width="325">'.$row['StreetAddress'].','. $row['City'].'</td>';
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
                                            
                        mysql_close($con);
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
