<!DOCTYPE html>

<html>
<head>
    <title>Ticket Updated  - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

    <style>
		#navbar li {
			list-style-type: none;
			display: block;
			padding: 5px 25px;
			float:left;
		}
		table {
			width: 75%;
			margin: 0 auto;
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
    <?php
    if(isset($_POST['TicketID'])){
                // Create connection
                $con = mysql_connect('127.0.0.1:33067','root','');

                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

                $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                $sql = "UPDATE MaintenanceTickets SET Resolved = '$_POST[Resolved]' WHERE TicketID = '$_POST[TicketID]'";

                $result = mysql_query($sql,$con);
                

                
                echo '<h1>Ticket No. '.$_POST['TicketID'].'</h1>';

                mysql_close($con);
            }
            ?>
    
        <article>

            <section id="applicationform">
	            <h3>Ticket Has Been Updated</h3>
	            <p><a href="ticket-all.php">All Tickets</a></p>
                    
              
            </section>
        </article>

    <?php include "footer.php"; ?>

  
    </div> 

</body>
</html>
