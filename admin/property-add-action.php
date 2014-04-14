<!DOCTYPE html>

<html>
<head>
    <title>Property Added - J&R Properties</title>
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

    <cfinclude template="header.cfm">
                <h1>Property</h1>
    
        <article>
            <h3>Property Added</h3>
                    <p><a href="property-all.cfm">All Properties</a></p>

 
            <section id="Propertyform">              	
            	<cfoutput>
			<table>
                            <tr>
                                <th colspan="2">Property</th>
                            </tr><tr>
                                <td><strong>Property ID</strong></td>
				<td>#PropertyID#</th>
                        </tr>
                        <tr>
                            <td><b>Street Address:</b></td>
                            <td>#StreetAddress#</td>
                        </tr>
                        <tr>
                            <td><strong>City:</strong></td>
                            <td>#City#</td>
                        </tr>
                        <tr>
                            <td><strong>State:</strong></td>
                            <td>#State#</td>
                        </tr>
                        <tr>
                            <td><strong>Property Type:</strong></td>
                            <td>#PropertyType#</td>
                        </tr>
                        <tr>
                            <td><b>Number of Units:</b></td>
                            <td>#NumberofUnits#</td>
                        </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
    					<cfinsert datasource="team3" tablename="Properties" >
                        </cfoutput>
                    
              
            </section>
        </article>

		<cfinclude template="footer.cfm">

  
    </div> 

</body>
</html>
