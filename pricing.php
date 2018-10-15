<?php
session_start();
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YOUTH BOWLING AWARDS</title>
    <link rel="stylesheet" type="text/css" href="_/css/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="_/css/mystyles.css" media="screen">
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-7651007-23', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="_/js/jquery-1.6.min.js" type="text/javascript"></script>
    <script src="_/js/jquery.cycle.all.js" type="text/javascript"></script>
    <script type="text/xml">
    <oa:widgets>
      <oa:widget wid="2559022" binding="#slideshow" />
    </oa:widgets>
    </script>
</head>
<body id="about">
    <div class="container"> <!-- container -->
        <header> <!-- header -->
            <?php 
            include 'includes/db.php';
            $db = new db();
            include 'includes/header.php'; ?>      
        </header> <!-- end of header --> 
        <div class="row">
          <div class="col-sm-12" style="text-align:center;">
              <img src="images/pricing page.jpg">
          </div>
        </div>
        <?php include 'includes/footer.php'; ?>  
    </div> <!-- container -->
        <a id="toTop" href="#"><span class="glyphicon glyphicon-chevron-up"></span></a>
</body>
<script type="text/javascript">
$(document).ready(function()
 {
    // Hide the toTop button when the page loads.
 $("#toTop").hide();
});
 
 // This function runs every time the user scrolls the page.
 $(window).scroll(function(){
 
// Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
 if($(window).scrollTop() > 0){
 
// If it's more than or equal to 0, show the toTop button.
 console.log("is more");
 $("#toTop").fadeIn("slow");
 });
 else {
 // If it's less than 0 (at the top), hide the toTop button.
 console.log("is less");
 $("#toTop").fadeOut("slow");
 
});
 });
 
// When the user clicks the toTop button, we want the page to scroll to the top.
 $("#toTop").click(function(){
 
// Disable the default behaviour when a user clicks an empty anchor link.
 // (The page jumps to the top instead of // animating)
 event.preventDefault();
 
// Animate the scrolling motion.
 $("html, body").animate({
 scrollTop:0
 },"slow");
 
});

</script>