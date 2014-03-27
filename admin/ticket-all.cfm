<!DOCTYPE html>

<html>
<head>
    <title>Maintenance Requests - Admin - J&R Properties</title>
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
<cfquery datasource="team3" name="allrequests">
select * from MaintenanceTickets;
</cfquery>
<cfquery datasource="team3" name="unresolvedrequests">
select * from MaintenanceTickets where Resolved = No;
</cfquery>

    <cfinclude template="header.cfm">
    
        <h1>Maintenance Requests</h1>
        <cfoutput>
            <h3>All Unresolved Requests Requests: #unresolvedrequests.RecordCount#</h3>
            
            <table>
            	<tr>
                	<th colspan="6">Tickets</th>
                </tr>
                <tr>
                	<th>Date Filed</th>
                	<th>Last Name</th>
                	<th>First Name</th>
                	<th>Unit ID</th>
                	<th>Resolved</th>
                	<th>Options</th>
                </tr>
                        <cfloop query="allrequests">
                        <tr>
                            <td>#DATEFORMAT(IssueDate, "m/d/yyyy")#</td>
                            <td><cfif TenantLastName eq ''>N/A<cfelse>#TenantLastName#</cfif></td>
                            <td><cfif TenantFirstName eq ''>N/A<cfelse>#TenantFirstName#</cfif></td>
                            <td>#UnitID#</td>
                            <td>#YesNoFormat(Resolved)#</td>
                            <td><form action="ticket-full.cfm" method="post">
                            <input type="hidden" name="TicketID" value="#TicketID#">
                            <input value="See More" type="submit" class="button">
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
