<!DOCTYPE html>

<html>
<head>
    <title>J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="description" content="J&R Properties is a property management firm that administrates commercial and residential properties within the Greater Boston area.">


<!-- slideshow -->
  <link rel="stylesheet" type="text/css" href="css/slide.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="js/jquery.slides.min.js"></script>
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
<h1>J&amp;R Properties</h1>
<h3>About Us</h3>
            <p>J&R Properties is a property management firm that administrates commercial and residential properties within the Greater Boston area. </p>
            <p>We are committed to providing expert property management services to building owners and residents. </p>
      <p>Our vision is to create strong relationships with clients, residents and the local community.</p>
            <p> Through hard work and dedication, J&R Properties has successfully operated by its vision since 1987.</p>
            <p>&nbsp;</p>

        
        <article>
  <div class="container">
    <div id="slides">

                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT * FROM Properties";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {
        $key = 'DkDseIX14GOD+5UhjpWdh7YzHTj5RRmOSrfJI/Gry+Lk+kxWVF4jvDhUBLHu23LnNycMqCmKrsK2dEuQPAy8sg=='; //password for encryption

                          $dataStreetAddress = base64_decode($row['StreetAddress']);
$ivStreetAddress = substr($dataStreetAddress, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
$decryptedStreetAddress = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($dataStreetAddress, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$ivStreetAddress),"\0");//script to decrypt


                            echo '<img src="img/'.$row['Photos'].'" alt="Property at '.$decryptedStreetAddress.'" width="250" />';
                      
                          }
                                            
                        mysqli_close($con); 
                        ?>
    </div>
  </div>
           <p>&nbsp;</p> 
      </article>
<?php include 'footer.php'; ?>

  
    </div>

</body>
</html>
