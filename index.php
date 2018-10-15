<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Promote your passion in Bowling Games , to earn USBC bowling awards for every winning games. you can personalized brag tags bowling awards here.
              ">
        <meta name="keywords" content="usbc youth bowling awards">
        <meta name="author" content="Meristone">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>USBC YOUTH BOWLING AWARDS</title>
        <link rel="stylesheet" type="text/css" href="_/css/bootstrap.css" media="screen">
        <link rel="stylesheet" type="text/css" href="_/css/mystyles.css" media="screen">
        <link rel="canonical" href="http://www.youthbowlingawards.com/"/>
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

            ga('create', 'UA-43489179-30', 'auto');
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
            include 'includes/header.php'; ?>
            <?php include 'includes/carousel.php'; ?>

            <br><br>
            <div class="jumbotron">
                <h1>Youth Bowling USBC Awards</h1>
                <p>Welcome to <span class="four">USBC YOUTH BOWLING AWARDS</span> , a collection of bowling awards and bowling alley designs. They are cool alternatives to show everyone that you are a good bowler. <br> These Plastic brag tags are used as dog tag necklace, keychain tags, luggage and bag tags, and lanyards. We have various collection of <span class="uline">bowling graphics award</span> design for your bowling club and you can customize if for FREE. Whether you need a <span class="italic">bowling champion trophy</span>, bowling medals or bowling plaque, our bowling awards come with brag tags and 100% players satisfaction. <br> We have <span class="bold">funny bowling awards categories</span> and many more. Guaranteed lowest price. No mininum orders, no setup fees, and no extra charge for custom orders. Call today to see what we have to offer for your bowling clubs. If you want more details about it, read our <span class="red">Youth bowling terms.</span>
                </p>
                <p>
                    <a class="btn btn-lg btn-primary" href="http://www.youthbowlingawards.com/term.php" role="button">Read it! &raquo;</a>
                </p>
            </div>

            <div class="row" style="margin-top: 20px;">  
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">                
                    <a class="hvr-grow-shadow" href="bagtags.php"><img class="img-responsive" src="images/Home Page/bagtags.jpg" alt="youthbowlingawards-bagtags"></a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">
                    <a class="hvr-grow-shadow" href="accessories.php"><img class="img-responsive" src="images/Home Page/accessories.jpg" alt="youthbowlingawards-accessories"></a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">
                    <a class="hvr-grow-shadow" href="jrbagtags.php"><img class="img-responsive" src="images/Home Page/jr.bagtags.jpg" alt="youthbowlingawards-jr-bagtags"></a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">
                    <a class="hvr-grow-shadow" href="products.php?cPath=94"><img class="img-responsive" src="images/Home Page/lanyards.jpg" alt="youthbowlingawards-lanyards"></a>
                </div>             


            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">
                    <a class="hvr-grow-shadow" href="products.php?cPath=119"><img class="img-responsive" src="images/Home Page/shoetags.jpg" alt="youthbowlingawards-shoe-tags"></a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">
                    <a class="hvr-grow-shadow" href="products.php?cPath=120"><img class="img-responsive" src="images/Home Page/spirit_tags.jpg" alt="youthbowlingawards-spirit-tags"></a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">
                    <a class="hvr-grow-shadow" href="products.php?cPath=105"><img class="img-responsive" src="images/Home Page/swagtags.jpg" alt="youthbowlingawards-swag-tags"></a>
                </div>
                <div class="col-sm-3 col-md-4 col-lg-3 col-xs-6">
                    <a class="hvr-grow-shadow" href="products.php?cPath=106"><img class="img-responsive" src="images/Home Page/swagtag_skinnies.jpg" alt="youthbowlingawards-skinnies"></a>
                </div>

            </div>



            <?php include 'includes/footer.php'; ?>
        </div> <!-- container -->
    </body>
</html>


