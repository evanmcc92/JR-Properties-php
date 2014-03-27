<!DOCTYPE html>

<html>
<head>
    <title>All Listings - Admin - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">
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
			margin: 0 auto;
			width:75%;
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
               
            <cfquery datasource="team3" name="listings">
            SELECT UnitID, StreetAddress, City, DateAvailable FROM ResidentialUnits
            UNION
            SELECT UnitID, StreetAddress, City, DateAvailable FROM CommercialUnits
            </cfquery>

    <cfinclude template="header.cfm">
    
        <h1>Listings</h1>
        <cfoutput>
            <h3>Total Listings: #listings.RecordCount#</h3>
            <h3><a href="listing-add.cfm">Add New Listing</a></h3>
            
            <table>
            	<tr>
                	<th colspan="6">Listings</th>
                </tr>
                <tr>
                	<th>Unit ID</th>
                	<th>Street Address</th>
                	<th>City</th>
                	<th colspan="2">Options</th>
                </tr>
                <cfloop query="listings">
                <tr>
                	<td>#UnitID#</td>
                	<td>#StreetAddress#</td>
                	<td>#City#</td>
                	<td><form action="listing-full.cfm" method="post">
                    <input type="hidden" name="UnitID" value="#UnitID#">
                    <input value="See More" type="submit" class="button">
                    </form></td>
                	<td><form action="listing-update.cfm" method="post">
                    <input type="hidden" name="UnitID" value="#UnitID#">
                    <input value="Edit" type="submit" class="button">
                    </form></td>
                </tr>
                </cfloop>
                <tr>
                    <td colspan="6" class="break">&nbsp;</td>
                </tr>
            </table>
        </cfoutput>
    <cfinclude template="footer.cfm">
    </div>

</body>
</html>
