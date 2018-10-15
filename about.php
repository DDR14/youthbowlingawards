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
            <div class="col-md-4">                
                <img class="img-responsive" src="images/about_tag.jpg" style="margin-left: 40px;">
            </div>
            <div class="col-md-7">
                <center><img src="images/contact_icon.jpg"></center>
            </div>
        </div>
            <div class="jumbotron">
                <h1>About Us</h1>
                <p> Youth Bowling Awards is a complete line of bowling awards for youth tournaments and competitions. Our youth bowling awards are made in the USA. We have 7 day turn around following reciept of order.
                </p> 
                <p>Guaranteed lowest price. No minimum orders, No setup fees, and no extra charge for custom orders. Call today to see what we have to offer for your next YOUTH BOWLING AWARDS.
                </p>     
            </div>
            <h1>Visit Us</h1>
        <div class="google-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3032.6143674226514!2d-111.856891!3d40.528014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8752876002988e41%3A0x34a631dc0be5be54!2s1192+Draper+Pkwy+%23515%2C+Draper%2C+UT+84020%2C+USA!5e0!3m2!1sen!2sph!4v1442973947249" width="800" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
<?php include 'includes/footer.php'; ?>      
    </div> <!-- end of container -->
</body>
</html>


