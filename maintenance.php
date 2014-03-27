<!DOCTYPE html>

<html>
<head>
    <title>Maintenance - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">   
</head>

<body>
                    <?php
                    if (isset($_POST['submit'])){

                        if(empty($_POST['Plumbing'])){
                            $Plumbing = "No";
                        } else {
                            $Plumbing = "Yes";
                        }

                        if(empty($_POST['Electric'])){
                            $Electric = "No";
                        } else {
                            $Electric = "Yes";
                        }

                        if(empty($_POST['Other'])){
                            $Other = "No";
                        } else {
                            $Other = "Yes";
                        }
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno()){
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "INSERT INTO MaintenanceTickets (IssueDate, TenantFirstName, TenantLastName, UnitID, Plumbing, Electric, Other, Description)
                                VALUES
                                (now(),'$_POST[TenantFirstName]','$_POST[TenantLastName]','$_POST[UnitID]','$Plumbing','$Electric','$Other','$_POST[Description]')";
                        ;
                        $retval = mysql_query( $sql, $con );
                        if(! $retval ) {
                          die('Error: ' . mysql_error());
                        }
                        echo'<script>alert("We apologize for the maintenance related incovenience. We will process your request to the best of our ability. For updates regarding your service request, please call (781) 974-5790.");</script>';
                    }                       
                    ?>

    <div id="body">

    <?php include 'header.php'; ?>
    
                <h1>Maintenance</h1>
        <article>
                <p>We  are sorry to hear that you are experiencing inconveniences with your unit.  Please fill out the form below with your name, phone and description of the  issue. Upon submitting the form, our team will begin to resolve the issue to  the best of our ability. </p>
               
            <section id="maintenanceform">
                <form method="POST" action="<?php $_PHP_SELF ?>">
                    <p>First Name: <input name="TenantFirstName" id="TenantFirstName" size="50" Required="YES" Message="Please enter First Name."></p>
                    <p>Last Name: <input name="TenantLastName" id="TenantLastName" size="50" Required="YES" Message="Please enter Last Name."></p>
                    <p><select name="UnitID" id="UnitID">
                    <?php
                        // Create connection
                        $con = mysql_connect('127.0.0.1:33067','root','');

                        // Check connection
                        if (mysqli_connect_errno())
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }

                        $db_selected = mysql_select_db("jrproper_jrproperties",$con);
                        $sql = "SELECT UnitID FROM ResidentialUnits UNION All SELECT UnitID FROM CommercialUnits Order by UnitID";
                        $result = mysql_query($sql,$con);


                        while($row = mysql_fetch_array($result))
                          {

                            echo                '<option value="'.$row['UnitID'].'">'.$row['UnitID'].'</option>';
                      
                          }
                                            
                        ?>
                    </select>
                    </p>
                    <p><input type="checkbox" name="Plumbing" value="Y">Plumbing 
                    <input type="checkbox" name="Electric" value="Y">Electric 
                    <input type="checkbox" name="Other" value="Y">Other</p>
                    <p>Description:<br>
                       <textarea name="Description" id="description" cols="43" rows="5" placeholder="Enter comments here."></textarea></p>
                    <p><input type="submit" name="submit" value="Submit" class="button"> <input type="reset" value="Reset" class="button"></p> 
                </form>
                
            </section>
        </article>
        
<?php include 'footer.php'; ?>

    </div>

</body>
</html>
