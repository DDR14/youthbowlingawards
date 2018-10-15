<?php
session_start();
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="youthbowlingawards" content="youthbowlingawards products">
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
<body id="products">
    <div class="container"> <!-- container -->
        <?php
        include 'includes/db.php';
        $db = new db();
        include 'includes/header.php';
        $category = $db->find('first', 'zen_categories_description', 'categories_id = :cid', ['cid' => $_GET['cPath']]);
        ?>
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="awards.php">Awards</a></li>
                    <li><?= $category['categories_name']; ?></li>                    
                </ul>
            </div>
        </div>
        <div class="col-sm-12" style="text-align:center;">

            <?php
            $products = $db->find('all', 'zen_products a 
INNER JOIN zen_products_description b 
ON a.products_id = b.products_id 
INNER JOIN zen_products_to_categories c 
ON a.products_id = c.products_id', 'c.categories_id = :cPath AND a.products_status <> 0', ['cPath' => $_GET['cPath']]);

            foreach ($products as $row) {
                //boostpromotions IP
                echo "<li class='tag hvr-grow-shadow'><a class='thumbnail' href='productsinfo.php?products_id={$row["products_id"]}'>
                                            <center><img src='http://50.87.226.168/images/{$row["products_image"]}' alt='youthbowlingawards-{$row["products_name"]}' />
                                            <h6>{$row["products_model"]}</h6>
                                            <p>{$row["products_name"]}</p></center></a>
                                                        </li>";
            }
            ?>
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>    
    <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
</body>

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