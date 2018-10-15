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
            <div class="row" >
                <div class="col-sm-8">
                    <?php include 'includes/carousel.php'; ?>
                </div>
                <div class="col-sm-4">
                    <div>
                        <a href="accessories.php"><img class="img-responsive" src="images/Home Page/accessories.jpg" alt="youthbowlingawards-accessories"></a>
                    </div>
                    <div>
                        <a href="bagtags.php"><img class="img-responsive" src="images/Home Page/bagtags.jpg" alt="youthbowlingawards-bagtags"></a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-4">
                    <a href="jrbagtags.php"><img class="img-responsive" src="images/Home Page/jr.bagtags.jpg" alt="youthbowlingawards-jr-bagtags"></a>
                </div>
                <div class="col-sm-4">
                    <a href="products.php?cPath=94"><img class="img-responsive" src="images/Home Page/lanyards.jpg" alt="youthbowlingawards-lanyards"></a>
                </div>             
                <div class="col-sm-4">
                    <a href="products.php?cPath=119"><img class="img-responsive" src="images/Home Page/shoetags.jpg" alt="youthbowlingawards-shoe-tags"></a>
                </div>

            </div>
            <div class="row" >
                <div class="col-sm-4">
                    <a href="products.php?cPath=120"><img class="img-responsive" src="images/Home Page/spirit_tags.jpg" alt="youthbowlingawards-spirit-tags"></a>
                </div>
                <div class="col-sm-4">
                    <a href="products.php?cPath=105"><img class="img-responsive" src="images/Home Page/swagtags.jpg" alt="youthbowlingawards-swag-tags"></a>
                </div>
                <div class="col-sm-4">
                    <a href="products.php?cPath=106"><img class="img-responsive" src="images/Home Page/swagtag_skinnies.jpg" alt="youthbowlingawards-skinnies"></a>
                </div>

            </div>
            <?php include 'includes/footer.php'; ?>
        </div> <!-- container -->
    </body>
</html>


