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
    <style type="text/css">


    </style>

</head>
<body id="term">

    <div class="container">
        <?php 
        include 'includes/db.php';
        $db = new db();
        include 'includes/header.php'; ?> 
        <div>
            <?php
            $file = '/home2/boostpr1/public_html/includes/languages/english/html_includes/glasgow_neat/define_conditions.php';
            $file_contents = file_get_contents($file);
            echo str_replace('www.BoostPromotions.com', 'BoostPromotions dba YouthBowlingAwards', $file_contents);
            ?>
        </div> 
        <div class="clearfix"></div>
        <!-- content -->
        <?php include 'includes/footer.php'; ?>    
    </div> <!-- end of container -->
</body>
</html>


