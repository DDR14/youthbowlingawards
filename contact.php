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
<body id="contact">
    <div class="container"> 
        <?php 
        include 'includes/db.php';
        $db = new db();
        include 'includes/header.php'; ?>  
        <h3>Contact Us</h3>
        <ul>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i> 1192 Draper Pkwy #515 Draper, Utah 84020 USA</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> 801-987-8351 </li>
            <li>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <a href="mailto:support@youthbowlingawards.com" target="_top">support@youthbowlingawards.com</a>
            </li>
        </ul>
        <?php include 'includes/footer.php'; ?>
    </div> <!-- container -->    
</body>
</html>


