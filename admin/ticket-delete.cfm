<!DOCTYPE html>

<html>
<head>
    <title>Ticket Deleted - J&R Properties</title>
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
<cfquery datasource="team3" name="applications">
select * from MaintenanceTickets WHERE TicketID = #Form.TicketID#;
</cfquery>
<cfquery datasource="team3" name="DeleteApplication"> 
DELETE FROM MaintenanceTickets WHERE TicketID = #Form.TicketID#;
</cfquery>
                <cfoutput query="applications">
                <h1>Ticket No. #TicketID#</h1>
    
        <article>
<h3>The following ticket has been deleted.</h3> 
               

            <section id="applicationform">
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
                            <td colspan="2">&nbsp;</td>
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
