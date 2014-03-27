<!DOCTYPE html>

<html>
<head>
    <title>Commercial Properties - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">


    
</head>

<body>
<cfquery datasource="team3" name="commercialunits">
select * from CommercialUnits
</cfquery>

    <div id="body">

    <cfinclude template="header.cfm">
    
        <article>
                <h1>Commercial</h1>
                <p>Look below for descriptions and pictures of the commercial properties in our portfolio. We are currently looking to expand our commercial property management.</p>
                <section>
                    <cfloop query="commercialunits">
					<cfoutput>
                    <table id="resident-#UnitID#" class="residentlisting">
                        <tr>
                            <td width="295" rowspan="5">
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
                            <td>Date Available: #DATEFORMAT(DateAvailable, "m/d/yyyy")#</td>
                        </tr>
                        <tr>
                            <td>#Description#</td>
                        </tr>
                    </table>
                   </cfoutput>
                   </cfloop>
                </section>
        </article>
<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
