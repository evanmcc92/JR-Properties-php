<!DOCTYPE html>

<html>
<head>
    <title>Contact Us - J&R Properties</title>
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
        subject="Contact Us Message"
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
            <h1>Contact Us</h1>
            <p>Text for contact us.</p>
            <p>Our main office is located at ______. To contact us by  phone, please call &nbsp;_____</p>
            <p>&lt;&lt;google map of location&gt;&gt;</p>
            <p>&nbsp;</p>
            <p>Feel free to fill out the following form for any general  inquiries you may have.</p>
            <section id="emailform">
                <form method="POST" action="landlord.cfm" onSubmit="completeAlert()">
                    <p>Email: <input name="email" id="email" size="50" Required="Yes" Message="Please enter email."></p>
                    <p>Name: <input name="name" id="name" size="50" Required="YES" Message="Please enter Complete Name."></p>
                    <p>Message:<br>
                       <textarea name="message" id="message" cols="43" rows="5" placeholder="Enter message here."></textarea></p>
                    <p><input type="submit" value="Submit"> <input type="reset" value="Reset"></p> 
                </form>
            </section>
      </article>
        
        
<cfinclude template="footer.cfm">

    </div>

</body>
</html>
