<!DOCTYPE html>

<html>
<head>
    <title>Ticket Updated  - J&R Properties</title>
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
<cfquery datasource="team3" name="tickets">
select * from MaintenanceTickets WHERE TicketID = #Form.TicketID#;
</cfquery>

    <cfinclude template="header.cfm">
                <cfoutput query="tickets">
                <h1>Ticket No. #TicketID#</h1>
    
        <article>
</article>
</cfoutput>

<cfupdate datasource="team3" tablename="MaintenanceTickets"> 
            <section id="applicationform">
            <h3>Ticket Has Been Updated</h3>
                    <p><a href="ticket-all.cfm">All Tickets</a></p>
                    
              
            </section>
        </article>

		<cfinclude template="footer.cfm">

  
    </div> 

</body>
</html>
