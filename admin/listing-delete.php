<!DOCTYPE html>

<html>
<head>
<cfoutput>
    <title>Listing #UnitID# Deleted - J&R Properties</title>
    </cfoutput>
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
			margin: 0 auto 20px;
		}
		td, th {
			padding:5px;
		}
	</style>
    
</head>

<body>


    <div id="body">

    <cfinclude template="header.cfm">
    <cfif UnitID contains'c'>
    
<cfquery datasource="team3" name="clistings">
select * from CommercialUnits WHERE UnitID = '#Form.UnitID#';
</cfquery>
<cfquery datasource="team3" name="DeleteApplication"> 
DELETE FROM CommercialUnits WHERE UnitID = '#Form.UnitID#';
</cfquery>
                <cfoutput query="clistings">


            <section id="applicationform">
                <h1>Listing No. #UnitID# Has Been Deleted</h1>
                <p><form action="listing-delete.cfm" method="post" id="delete-ticket">
                    <input type="hidden" name="UnitID" value="#UnitID#">
                    <input value="Delete" type="submit" class="button">
                    </form></p>
                    <p><a href="listing-all.cfm">All Listings</a></p>
                    <p>&nbsp;</p>
                
                    <table id="resident-#UnitID#" class="residentlisting">
                        <tr>
                            <td width="295" rowspan="4">
                            	<img src="../img/#StreetAddress#.png" alt="#Description#" width="275" />
							</td>
                            <td width="325">#StreetAddress#, #City#</td>
                        </tr>
                        <tr>
                            <td>#UnitName#</td>
                        </tr>
                        <tr>
                            <td>#DollarFormat(MonthlyPrice)# (monthly)</td>
                        </tr>
                        <tr>
                            <td>Date Available: #DateAvailable#</td>
                        </tr>
                        <tr>
                            <td>#Description#</td>
                        </tr>
                    </table>
                    </section>
              </cfoutput>
    <cfelse>

<cfquery datasource="team3" name="rlistings">
select * from ResidentialUnits WHERE UnitID = '#Form.UnitID#';
</cfquery>
<cfquery datasource="team3" name="DeleteApplication"> 
DELETE FROM ResidentialUnits WHERE UnitID = '#Form.UnitID#';
</cfquery>
                <cfoutput query="rlistings">


            <section id="applicationform">
                <h1>Listing No. #UnitID# Has Been Deleted</h1>
                <p><form action="listing-delete.cfm" method="post" id="delete-ticket">
                    <input type="hidden" name="UnitID" value="#UnitID#">
                    <input value="Delete" type="submit" class="button">
                    </form></p>
                    <p><a href="listing-all.cfm">All Listings</a></p>
                    <p>&nbsp;</p>
                
                    <table id="resident-#UnitID#" class="residentlisting">
                        <tr>
                            <td width="295" rowspan="5">
                            	<img src="../img/#StreetAddress#.png" alt="#Description#" width="275" />
							</td>
                            <td width="325">#StreetAddress#, #City#</td>
                        </tr>
                        <tr>
                            <td>#DollarFormat(MonthlyPrice)# (monthly)</td>
                        </tr>
                        <tr>
                            <td>#NoBeds# Bed & #NoBaths# Bath</td>
                        </tr>
                        <tr>
                            <td>Date Available: #DateAvailable#</td>
                        </tr>
                        <tr>
                            <td>#Description#</td>
                        </tr>
                    </table>
                    </section>
    </cfoutput>
                 </cfif> 
              
            </section>
        </article>

		<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
