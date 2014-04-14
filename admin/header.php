<?php 

    // Connects to your Database 
  if(strpos($_SERVER['REQUEST_URI'], 'login.php')){
    //do nothing
  } else {
    $con = mysql_connect('127.0.0.1:33067','root','');

    // Check connection
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $db_selected = mysql_select_db("jrproper_jrproperties",$con);


    //checks cookies to make sure they are logged in 

    if(isset($_COOKIE['A2BrYce7cQy2rqxSQv58'])) { 

      $username = $_COOKIE['A2BrYce7cQy2rqxSQv58']; 

      $pass = $_COOKIE['uvvULDuCBDNvD6CHY7tl']; 

      $check = mysql_query("SELECT * FROM User WHERE username = '$username'")or die(mysql_error()); 

      while($info = mysql_fetch_array( $check ))   { 

        //if the cookie has the wrong password, they are taken to the login page 

        if ($pass != $info['password']) {
          header("Location: login.php"); 
        } 
      }
    } else {
      header("Location: login.php"); 
    }
  }
?>
<header id="top">
  <figure id="logo"><a href="../index.php"><img src="../img/logo.png" alt="J&R Properties Logo"/></a></figure>
  <address>52R Green Street<br>
	Lynn, MA 02194<br><br>

	(781) 974-5790
  <?php 
    if(isset($_COOKIE['A2BrYce7cQy2rqxSQv58'])){
      echo '<p><a href="logout.php">Logout</a></p>';
    }
  ?>
  </address>
  <nav>
      <ul id="navbar">
          <li><a href="index.php">Admin Home</a></li>
          <li><a href="listing-all.php">Listings</a></li>
          <li><a href="ticket-all.php">Maintenance Requests</a></li>
          <li><a href="applicant-all.php">Applications</a></li>
          <li><a href="tenant-all.php">Tenants</a></li>
          <li><a href="property-all.php">Properties</a></li>
          <li><a href="../index.php">Public Site</a></li>
      </ul>
  </nav>
</header>
