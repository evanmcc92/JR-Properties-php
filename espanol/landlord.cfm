<!DOCTYPE html>

<html>
<head>
    <title>Landlord - J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

    
</head>

<body>
<!-- email form -->

<!--if the forms email field is filled out-->
<cfif isDefined("form.email")>
<cfmail from="postmaster@evanamccullough.com" 
        to="#form.name# <#form.email#>"
        subject="Landlord Message"
        type="html" >
        <html>
            <body>
                <p>Message from:</p>
                <ul>
                    <li>Name: #form.name#</li>
                    <li>Email Address: #form.email#</li>
                </ul>

                <p>Comments:<br> 
                #form.message#</p>
            </body>
        </html>
</cfmail>
<!--output-->

<cfoutput>
    <script>
        function completeAlert() {
            alert("Thank you #form.name# for sending an email, expect to hear something soon.");
        }
    </script>
</cfoutput>
</cfif>

<!--end email form-->
    <div id="body">

    <cfinclude template="header.cfm">
    
        <article>
            <section id="landlord-text">
                <h1>Landlord</h1>
                <p>J & R Properties is committed to administrating all particulars associated with maintenance and management. We provide the following services:</p>
    
                <p>Property Management:</p>
<ul>
  <li>Rent collections          </li>
  <li>Expense payments</li>
          <li>Fostering professional relationships with tenants</li>
          <li>Renewal and extension of leases</li>
          <li>Background and credit checks of applicants</li>
          <li>Compliant with local, state and federal laws and regulations</li>
        </ul>
                <p>Maintenance:</p>
                <ul>
                    <li>Timely problem identification and resolution.</li>
                    <li>Plumbing, electric and carpentry services.</li>
                    <li>Frequent property inspections.</li>
                    <li>Friendly service.</li>
                </ul>
                <p>&nbsp;</p>
                <p>Interested in a property manager? Contact us here to set up a meeting.</p>
            </section>

            <section id="emailform">
                <form method="POST" action="landlord.cfm" onSubmit="completeAlert()">
                    <p>Email: <input name="email" id="email" size="50" Required="Yes" Message="Please enter email."></p>
                    <p>Name: <input name="name" id="name" size="50" Required="YES" Message="Please enter Complete Name."></p>
                    <p>Message:<br>
                       <textarea name="message" id="message" cols="43" rows="5" placeholder="Enter message here."></textarea></p>
                    <p><input type="submit" value="Submit"  class="button"> <input type="reset" value="Reset"  class="button"></p> 
                </form>
            </section>
        </article>
<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
