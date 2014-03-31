<!DOCTYPE html>

<html>
<head>
    <title>Commercial Properties - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">


    
</head>

<body>

    <div id="body">

    <?php include 'header.php'; ?>
                <h1>Propiedades Comerciales</h1>
    
        <article>
                <p>Vea a continuaci&oacute;n las descripciones y fotograf&iacute;as de nuestras propiedades comerciales. En estos momentos estamos buscando ampliar nuestro portafolio de nuestras propiedades comerciales.</p>
                <section>
        <?php
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "SELECT * FROM CommercialUnits";
                $result = mysql_query($sql,$con);


                while($row = mysql_fetch_array($result))
                  {

                    echo                '<table id="commercial-'.$row['UnitID'].'" class="residentlisting">';
                    echo                "<tr>";
                    echo                '<td width="295" rowspan="5">';
                    echo                '<img src="../img/'.$row['StreetAddress'].'.png" alt="'.$row['Description'].'" width="275" />';
                    echo                    "</td>";
                    echo                     '<td width="325">'.$row['StreetAddress'].','. $row['City'].'</td>';
                    echo                "</tr>";
                    echo                "<tr>";
                    echo                    '<td>'.$row['UnitName'].'</td>';
                    echo                "</tr>";
                    echo                "<tr>";
                    echo                    '<td>'.$row['MonthlyPrice'].' (monthly)</td>';
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
        </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
