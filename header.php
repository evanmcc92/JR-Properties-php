<header id="top">
            <figure id="logo"><a href="index.php"><img src="img/logo.png" alt="J&R Properties Logo"/></a></figure>
            <address>
              52R Green Street<br>
              Lynn, MA 01902<br><br>
              (781) 974-5790
            </address>
            <nav>
                             <ul id="navbar">
                    <li><a href="maintenance.php">Maintenance</a></li>
      <li><a href="#">Properties</a><ul>
                        <li><a href="commercial.php">Commercial</a></li>
                        <li><a href="residential.php">Residential</a></li></ul>
                    </li>
                    <li><a href="landlord.php">Landlord</a></li>
                    <li><a href="app.php">Application</a></li>
                    <li><a href="espanol/">Espa&ntilde;ol</a></li>
</ul>

            </nav>
        </header>
        <script>
sfHover = function() {
   var sfEls = document.getElementById("navbar").getElementsByTagName("li");
   for (var i=0; i<sfEls.length; i++) {
      sfEls[i].onmouseover=function() {
         this.className+=" hover";
      }
      sfEls[i].onmouseout=function() {
         this.className=this.className.replace(new RegExp(" hover\\b"), "");
      }
   }
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
</script>
