<!DOCTYPE html>

<html>
<head>
	<cfoutput>
    <title>Listing #UnitID# Updated  - J&R Properties</title>
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
                <h1>Listing Updated</h1>
    
        <article>
</article> 
            <section id="listingform">
            	<cfif #Form.UnitID# contains "R" >
                    <cfquery datasource="team3" name="residential">
                    Select * from ResidentialUnits WHERE UnitID = '#Form.UnitID#';
                    </cfquery>
                	<cfoutput query="residential">
                    <p><a href="listing-all.cfm">All Listings</a></p>
                    <form method="post" action="listing-update-action.cfm">
                    	<table>
                            <tr>
                                <th colspan="2">Residential Listing</th>
                            </tr>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td><input name="UnitID" id="UnitID" type="text" required value="#UnitID#"></td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td><input name="UnitName" id="UnitName" type="text" value="#UnitName#"></td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td><input name="PropertyID" id="PropertyID" type="text"value="#PropertyID#" ></td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td><input name="StreetAddress" id="StreetAddress" type="text" value="#StreetAddress#"></td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td><input name="City" id="City" type="text" value="#City#" ></td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td><input name="State" id="State" type="text" value="#State#"></td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td><input name="DateAvailable" id="DateAvailable" type="text" value="#DateAvailable#"></td>
                            </tr>
                            <tr>
                                <td><strong>Number of Bedrooms:</strong></td>
                                <td> <select name="NoBeds" id="NoBeds">
                                          <option value="Studio">Studio</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4+">4+</option>
                            		</select></td>
                            </tr>
                            <tr>
                        		<td><strong>Number of Bathrooms:</strong></td>
                                <td><select name="NoBaths" id="NoBaths">
                                        <option value="1/2">1/2</option>
                                        <option value="1">1</option>
                                        <option value="1 1/2">1 1/2</option>
                                        <option value="2+">2+</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td><input name="MonthlyPrice" id="MonthlyPrice" type="text" value="#MonthlyPrice#"></td>
                            </tr>
                            <tr>
                                <td><strong>Description*:</strong></td>
                                <td><textarea name="Description" id="Description" value="#Description#" ></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" class="button"></td>
                            </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                    
                    
                    </form>
                    </cfoutput>
                <cfelse>
                    <cfquery datasource="team3" name="commercial">
select * from CommercialUnits WHERE UnitID = '#Form.UnitID#';
                    </cfquery>
                <cfoutput query="commercial">
            		
                    <p><a href="listing-all.cfm">All Listings</a></p>
                    <form method="post" action="listing-update-action.cfm">
                    	<table>
                            <tr>
                                <td><strong>Unit ID*:</strong></td>
                                <td><input name="UnitID" id="UnitID" type="text" required value="#UnitID#"></td>
                            </tr>
                            <tr>
                                <td><strong>Unit Name:</strong></td>
                                <td><input name="UnitName" id="UnitName" type="text" value="#UnitName#"></td>
                            </tr>
                            <tr>
                                <td><strong>Property ID*:</strong></td>
                                <td><input name="PropertyID" id="PropertyID" type="text"value="#PropertyID#" ></td>
                            </tr>
                            <tr>
                                <td><strong>Street Address*:</strong></td>
                                <td><input name="StreetAddress" id="StreetAddress" type="text" value="#StreetAddress#"></td>
                            </tr>
                            <tr>
                                <td><strong>City*:</strong></td>
                                <td><input name="City" id="City" type="text" value="#City#" ></td>
                            </tr>
                            <tr>
                                <td><strong>State*:</strong></td>
                                <td><input name="State" id="State" type="text" value="#State#"></td>
                            </tr>
                            <tr>
                                <td><strong>Date Available*:</strong></td>
                                <td><input name="DateAvailable" id="DateAvailable" type="text" value="#DateAvailable#"></td>
                            </tr>
                            <tr>
                                <td><strong>Monthly Price*:</strong></td>
                                <td><input name="MonthlyPrice" id="MonthlyPrice" type="text" value="#MonthlyPrice#"></td>
                            </tr>
                            <tr>
                                <td><strong>Description*:</strong></td>
                                <td><textarea name="Description" id="Description" value="#Description#" ></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Submit" class="button"></td>
                            </tr>
                    		<tr>
                        		<td colspan="2" class="break">&nbsp;</td>
                            </tr>
                        </table>
                    </form>
                    </cfoutput>
                    </cfif>
                    
              
            </section>
        </article>

		<cfinclude template="footer.cfm">

  
    </div> 

</body>
</html>
