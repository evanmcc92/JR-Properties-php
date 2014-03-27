<!DOCTYPE html>

<html>
<head>
    <title>J&R Properties</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../img/favicon.ico" type="image/x-icon">


<!-- slideshow -->
  <link rel="stylesheet" type="text/css" href="../css/slide.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="../js/jquery.slides.min.js"></script>
  <script>
    $(function() {
      $('#slides').slidesjs({
        height: 1000,
        play: {
          active: true,
          effect: "slide",
          interval: 5000,
          auto: true,
          swap: true,
          pauseOnHover: false,
          restartDelay: 2500
        }, 
        pagination: {
          active: true,
        }
      });
    });
  </script>
<!-- end slideshow -->
    <style>
		#slides {
			width: 350px;
			margin: 0 auto;
		}
	</style>
</head>

<body>
            <cfquery datasource="team3" name="unit_id">
            SELECT StreetAddress FROM ResidentialUnits
            UNION
            SELECT StreetAddress FROM CommercialUnits
            </cfquery>
    <div id="body">
    
    <cfinclude template="header.cfm">
<h1>J&amp;R Properties</h1>
<h3>About Us</h3>
            <p>J & R Properties is a property management firm that administrates commercial and residential properties within the Greater Boston area. </p>
            <p>We are committed to providing expert property management services to building owners and residents. </p>
      <p>Our vision is to create strong relationships with clients, residents and the local community.</p>
            <p> Through hard work and dedication, J & R Properties has successfully operated by its vision since 1987.</p>
            <p>&nbsp;</p>

        
        <article>
  <div class="container">
    <div id="slides">
                    <cfloop query="unit_id">
                    	<cfoutput>
      <img src="../img/#StreetAddress#.png" alt="Property at #StreetAddress#" width="250" />
                   		</cfoutput>
                    </cfloop>
    </div>
  </div>
           <p>&nbsp;</p> 
      </article>
<cfinclude template="footer.cfm">

  
    </div>

</body>
</html>
