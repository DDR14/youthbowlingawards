<?php
session_start();
?>
<html>
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
    <body id="home">
        <div class="container"> <!-- container -->   
            <?php
            include 'includes/db.php';
            $db = new db();
            include 'includes/header.php';
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li><a href="awards.php">Awards</a></li>
                        <li>Bag Tags</li>                    
                    </ul>
                </div>
            </div>            
            <div class="row">
                <div class="col-sm-4">
                    <a href="products.php?cPath=108"><img class="img-responsive" src="images/awards/awards page rectangle bag tags.jpg" alt="awards page rectangle bag tags"></a>
                </div>
                <div class="col-sm-4">
                    <a href="products.php?cPath=109"><img class="img-responsive" src="images/awards/awards page circle bag tags.jpg" alt="awards page circle bag tags"></a>
                </div>             
                <div class="col-sm-4">
                    <a href="products.php?cPath=110"><img class="img-responsive" src="images/awards/awards page megaphone bag tags.jpg" alt="awards page megaphone bag tags"></a>
                </div>
            </div>       
            <div class="row">
                <div class="col-sm-4">
                    <a href="products.php?cPath=112"><img class="img-responsive" src="images/awards/awards page bookmark bag tags.jpg" alt="awards page bookmark bag tags"></a>
                </div>
                <div class="col-sm-4">
                    <a href="products.php?cPath=114"><img class="img-responsive" src="images/awards/awards page custom circle bag tags.jpg" alt="awards page custom circle bag tags"></a>
                </div>
            </div>             
            <?php include 'includes/footer.php'; ?>
        </div> <!-- container -->
    </body>
</html>


