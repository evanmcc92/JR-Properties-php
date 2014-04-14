﻿<!DOCTYPE html>

<html>
<head>
    <title>J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <meta name="description" content="J&R Propiedades es una empresa de administración de propiedades comerciales y residenciales en el área de Boston. ">


<!-- slideshow -->
  <link rel="stylesheet" type="text/css" href="../css/slide.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="../js/jquery.slides.min.js"></script>
  <script>
    $(function() {
      $('#slides').slidesjs({
        height: 1000,
        play: {
          active: true,
          effect: "slide",
          interval: 5000,
          auto: true,
          swap: true,
          pauseOnHover: false,
          restartDelay: 2500
        }, 
        pagination: {
          active: true,
        }
      });
    });
  </script>
<!-- end slideshow -->
    <style>
		#slides {
			width: 350px;
			margin: 0 auto;
		}
	</style>
</head>

<body>
    <div id="body">
    
    <?php include 'header.php'; ?>
<h1>Nuestra compa&ntilde;&iacute;a </h1>
<h3>Acerca de J&amp;R Propiedades</h3>


<p>J&amp;R Propiedades es una empresa de administración de propiedades comerciales y residenciales en el &aacute;rea de Boston.</p>
<p>Estamos comprometidos con proporcionar servicios adminitrativos para los propietarios de edificios y sus residentes.</p>
<p>Nuestra visi&oacute;n es crear relaciones s&oacute;lidas con los clientes, los residentes y la comunidad local.</p>
<p>A trav&eacute;s de nuetro trabajo duro y dedicaci&oacute;n, J&amp;R Propiedades ha operado con &eacute;xito desde el año 1987.</p>

        
        <article>
  <div class="container">
    <div id="slides">
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

                            echo '<img src="../img/'.$row['Photos'].'" alt="Property at '.$row['StreetAddress'].'" width="250" />';                      
                          }
                                            
                        mysql_close($con);
                        ?>
    </div>
  </div>
           <p>&nbsp;</p> 
      </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
