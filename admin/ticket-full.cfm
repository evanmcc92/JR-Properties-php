<!DOCTYPE html>

<html>
<head>
<cfquery datasource="team3" name="tickets">
select * from MaintenanceTickets WHERE TicketID = #Form.TicketID#;
</cfquery>
                <cfoutput query="tickets">
    <title>Ticket No. #TicketID#  - J&R Properties</title>
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
			margin: 0 auto;
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
                <cfoutput query="tickets">
                <h1>Ticket No. #TicketID#</h1>
    
        <article><form action="ticket-delete.cfm" method="post" id="delete-ticket">
                    <input type="hidden" name="TicketID" value="#TicketID#">
                    <input value="Delete" type="submit" class="button">
                    </form></p>
                    <cfif Resolved eq 'Yes'>
                <p><form action="ticket-update.cfm" method="post">
                    <input type="hidden" name="TicketID" value="#TicketID#">
                    <input type="hidden" name="Resolved" value="N">
                    <input value="Issue is not resolved" type="submit" class="button">
                    </form></p>
                    <cfelse>
                <p><form action="ticket-update.cfm" method="post">
                    <input type="hidden" name="TicketID" value="#TicketID#">
                    <input type="hidden" name="Resolved" value="Y">
                    <input value="Issue is resolved" type="submit" class="button">
                    </form></p>
                    </cfif>
                    <p><a href="ticket-all.cfm">All Tickets</a></p>
                    <p>&nbsp;</p>
                    <table>
                        <tr>
                          <td colspan="4">#DATEFORMAT(IssueDate, "m/d/yyyy")#</td>
                      </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                                <th colspan="4">Ticket No. #TicketID#</th>
                        </tr>
                        <tr>
                            <td><b>First Name:</b></td>
                            <td>#TenantFirstName#</td>
                            <td><strong>Last Name:</strong></td>
                            <td>#TenantLastName#</td>
                        </tr>
                        <tr>
                            <td><strong>Unit ID:</strong></td>
                            <td>#UnitID#</td>
                            <td><strong>Resolved:</strong></td>
                            <td>#YesNoFormat(Resolved)#</td>
                        </tr>
                        <tr>
                                <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>Plumbing:</b></td>
                            <td>#YesNoFormat(Plumbing)#</td>
                            <td><strong>Electric:</strong></td>
                            <td>#YesNoFormat(Electric)#</td>
                        </tr>
                        <tr>
                            <td><b>Other:</b></td>
                            <td>#YesNoFormat(Other)#</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                                <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>Description:</b></td>
                        </tr>
                        <tr>
                            <td colspan="4">#Description#</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                             <td colspan="4" class="break">&nbsp;</td>
                        </tr>
                  </table>

              </cfoutput>
              
            </section>
        </article>

		<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
