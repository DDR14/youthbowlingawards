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
<body id="search">
    <div class="container"> <!-- container -->
        <?php 
        include 'includes/db.php';
        $db = new db();
        include 'includes/header.php'; ?>
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php?cPath=105">Products</a></li>
                    <li class="active">Search</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12" style="text-align:center;">
            <?php
            $search = $_GET['search'];

            $sql = "SELECT a.products_id, a.products_model, a.products_image, b.products_name, b.products_description
FROM zen_products a
INNER JOIN zen_products_description b 
ON a.products_id = b.products_id
WHERE a.manufacturers_id = '3' AND a.products_status != 0
AND (a.products_model LIKE '%$search%'
 OR a.products_image LIKE '%$search%'
 OR b.products_name LIKE '%$search%'
 OR b.products_description LIKE '%$search%')";

            $result = $db->raw($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            if ($row) {
                $products_id = $row['products_id'];
                $products_name = $row['products_name'];
                $products_description = $row['products_description'];
                $products_image = $row['products_image'];
                $products_model = $row['products_model'];

                echo "<li class='tag'><a class='thumbnail' href='productsinfo.php?products_id={$row["products_id"]}'>
          <center><img src='http://50.87.226.168/images/{$row["products_image"]}' alt='youtbowlingawards-{$row["products_name"]}' />
          <h6>{$row["products_model"]}</h6>
          <p>{$row["products_name"]}</p></center></a>
          </li>";
            } else {
                echo "<li>No Results</li>";
            }
            include 'includes/footer.php';
            ?>
        </div>
    </div>    
    <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
    <script type="text/javascript">
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                    backToTop = function () {
                        var scrollTop = $(window).scrollTop();
                        if (scrollTop > scrollTrigger) {
                            $('#back-to-top').addClass('show');
                        } else {
                            $('#back-to-top').removeClass('show');
                        }
                    };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }
    </script>
</body>
