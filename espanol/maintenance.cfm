<!DOCTYPE html>

<html>
<head>
    <title>Maintenance - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

    
</head>

<body>

    <div id="body">

    <cfinclude template="header.cfm">
    
        <article>
                <h1>Maintenance</h1>
                <p>We  are sorry to hear that you are experiencing inconveniences with your unit.  Please fill out the form below with your name, phone and description of the  issue. Upon submitting the form, our team will begin to resolve the issue to  the best of our ability. </p>
               
            <cfquery datasource="team3" name="unit_id">
            SELECT UnitID FROM ResidentialUnits
            UNION All
            SELECT UnitID FROM CommercialUnits
            Order by UnitID;
            </cfquery>
            <section id="maintenanceform">
                <form method="POST" action="maintenance.cfm" onSubmit="completeAlert()">
                           <cfoutput>
                <input name="IssueDate" id="IssueDate" type="hidden" value="#DateFormat(Now(), 'm/dd/yyyy')#">
                	</cfoutput>
                    <p>First Name: <input name="TenantFirstName" id="TenantFirstName" size="50" Required="YES" Message="Please enter First Name."></p>
                    <p>Last Name: <input name="TenantLastName" id="TenantLastName" size="50" Required="YES" Message="Please enter Last Name."></p>
                    <p><select name="UnitID" id="UnitID">
  					<option>Select a Unit</option>
                    <cfloop query="unit_id">
                    	<cfoutput>
                    		<option value="#UnitID#">#UnitID#</option>
                   		</cfoutput>
                    </cfloop>
                    </select>
                    </p>
                    <p><input type="checkbox" name="Plumbing" value="Y">Plumbing 
                    <input type="checkbox" name="Electric" value="Y">Electric 
                    <input type="checkbox" name="Other" value="Y">Other</p>
                    <p>Description:<br>
                       <textarea name="description" id="description" cols="43" rows="5" placeholder="Enter comments here."></textarea></p>
                    <p><input type="submit" value="Submit" class="button"> <input type="reset" value="Reset" class="button"></p> 
                </form>
                
                <cfinsert datasource="team3" tablename="MaintenanceTickets">
                
			  <cfoutput>
                  <script>
                      function completeAlert() {
                          alert("We apologize for the maintenance related incovenience. We will process your request to the best of our ability. For updates regarding your service request, please call 555-555-5555.");
                      }
                  </script>
              </cfoutput>
            </section>
        </article>
        
<cfinclude template="footer.cfm">

    </div>

</body>
</html>
