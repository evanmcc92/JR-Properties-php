<!DOCTYPE html>

<html>
<head>
<cfoutput>
    <title>Property #PropertyID# - J&R Properties</title>
    </cfoutput>
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

    <style>
		#navbar li {
			list-style-type: none;
			display: block;
			padding: 5px 10px;
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
		<cfoutput>
                <h1>Property #PropertyID# Has Been Deleted</h1>
		</cfoutput>
<cfquery datasource="team3" name="properties">
select * from Properties WHERE PropertyID = #Form.PropertyID#
</cfquery>
<cfquery datasource="team3" name="DeleteProperty"> 
DELETE FROM Properties WHERE PropertyID = #Form.PropertyID#
</cfquery>
                <cfoutput query="properties">


            <section id="propertyform">
                    <p><a href="property-all.cfm">All Properties</a></p>
                    <p>&nbsp;</p>
                
                    <table id="#PropertyID#">
                        <tr>
                                <th colspan="4">Property #PropertyID#</th>
                        </tr>
                        <tr>
                            <td><b>Street Address:</b></td>
                            <td>#StreetAddress#</td>
                            <td><strong>City:</strong></td>
                            <td>#City#</td>
                        </tr>
                        <tr>
                            <td><strong>State:</strong></td>
                            <td>#State#</td>
                            <td><strong>Property Type:</strong></td>
                            <td>#PropertyType#</td>
                        </tr>
                        <tr>
                            <td><b>Number of Units:</b></td>
                            <td>#NumberofUnits#</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                             <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                  </table>
                    </section>
    </cfoutput>
              
        </article>

		<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
