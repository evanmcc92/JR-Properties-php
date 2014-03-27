<!DOCTYPE html>

<html>
<head>
    <title>Applications - Admin - J&R Properties</title>
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
<cfquery datasource="team3" name="applications">
select * from Applications;
</cfquery>
    <cfinclude template="header.cfm">
    
        <h1>Applications</h1>
        <cfoutput>
            <h3>Total Applications: #applications.RecordCount#</h3>
            
            <table>
            	<tr>
                	<th colspan="5">Applications</th>
                </tr>
                <tr>
                	<th>Date Applied</th>
                	<th>Last Name</th>
                	<th>First Name</th>
                	<th>Monthly Income</th>
                	<th>Options</th>
                </tr>
                    <cfloop query="applications">
                    <tr>
                        <td>#DATEFORMAT(AppDate, "m/d/yyyy")#</td>
                        <td><cfif ApplicantLastName eq ''>N/A<cfelse>#ApplicantLastName#</cfif></td>
                        <td><cfif ApplicantFirstName eq ''>N/A<cfelse>#ApplicantFirstName#</cfif></td>
                        <td>#DollarFormat(MonthlyIncome)#</td>
                        <td><form action="applicant-full.cfm" method="post">
                        <input type="hidden" name="ApplicationID" value="#ApplicationID#">
                        <input value="See More" type="submit" class="button">
                        </form></td>
                    </tr>
                    </cfloop>
                <tr>
                    <td colspan="5" class="break">&nbsp;</td>
                </tr>
            </table>
        </cfoutput>
    <cfinclude template="footer.cfm">
    </div>

</body>
</html>
