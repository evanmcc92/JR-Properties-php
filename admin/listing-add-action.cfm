<!DOCTYPE html>

<html>
<head>
    <title>Listing Added  - J&R Properties</title>
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
                <h1>Listing</h1>
    
        <article>
            <h3>Listing Added</h3>
</article>
 
            <section id="listingform">
            	<cfif IsDefined("Form.NoBeds")>
                	<cfoutput>
                    <p><a href="listing-all.cfm">All Listings</a></p>
                    	<table>
                            <tr>
                                <th colspan="2">Commercial Listing</th>
                            </tr>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td>#UnitID#</td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td>#UnitName#</td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td>#PropertyID#</td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td>#StreetAddress#</td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td>#City#</td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td>#State#</td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td>#DateAvailable#</td>
                            </tr>
                            <tr>
                                <td><strong>Number of Bedrooms:</strong></td>
                                <td>#NoBeds#</td>
                            </tr>
                            <tr>
                        		<td><strong>Number of Bathrooms:</strong></td>
                                <td>#NoBaths#</td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td>#MonthlyPrice#</td>
                            </tr>
                            <tr>
                                <td><strong>Description*:</strong></td>
                                <td>#Description#</td>
                            </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                    </cfoutput>
    				<cfinsert datasource="team3" tablename="ResidentialUnits" >
                <cfelse>
                	<cfoutput>
                    <p><a href="listing-all.cfm">All Listings</a></p>
                    	<table>
                            <tr>
                                <th colspan="2">Commercial Listing</th>
                            </tr>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td>#UnitID#</td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td>#UnitName#</td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td>#PropertyID#</td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td>#StreetAddress#</td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td>#City#</td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td>#State#</td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td>#DateAvailable#</td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td>#MonthlyPrice#</td>
                            </tr>
                            <tr>
                                <td><strong>Description*:</strong></td>
                                <td>#Description#</td>
                            </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                        </cfoutput>
    					<cfinsert datasource="team3" tablename="CommercialUnits" >
                    </cfif>
              
            </section>
        </article>

		<cfinclude template="footer.cfm">

  
    </div> 

</body>
</html>
