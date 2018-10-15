
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo('Unauthorized. redirecting to home page..');
    ?>
    <script>
        window.location = 'index.php'
    </script>    
    <?php
    die();
}
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
    <body id="previousorders">   
        <div class="container"> <!-- container -->
            <?php
            include 'includes/db.php';
            $db = new db();
            include 'includes/header.php';
            ?> 
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li><a href="#">PERSONAL</a></li>
                        <li class="active">PREVIOUS ORDERS</li>
                    </ol>
                </div>
            </div>
            <h1>
                MY ACCOUNT INFORMATION
            </h1>
            <br/>
            <h4 class="text-center">Previous Orders</h4>
            <?php
            $orders = $db->find('all', 'zen_orders a INNER JOIN zen_orders_status b 
                ON a.orders_status = b.orders_status_id', "a.customers_id = $customers_id", [], 'a.date_purchased, a.orders_id, b.orders_status_name, a.order_total');
            if ($orders) {
                ?>
                <table class="table">
                    <tr>
                        <th>Date</th>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($orders as $list) {
                        ?>
                        <tr>
                            <td><?= date('m/d/Y', strtotime($list['date_purchased'])) ?></td>
                            <td>$<?= $list["orders_id"] ?></td>
                            <td><?= $list['orders_status_name'] ?></td>
                            <td>$<?= $list['order_total'] ?></td>
                            <td><a class=" btn-sm btn btn-default" href='view_order.php?id=<?= $list["orders_id"] ?>'>View Order</a></td>
                        </tr><?php
                    }
                } else {
                    echo "ORDERS IS CURRENTLY EMPTY.!" . "<br>";
                    echo "<a href='products.php?cPath=105'><button type='button' class='btn btn-primary btn-xs' value='back'>Shop more</button></a>";
                }
                ?>
            </table>
            <h4>My Account</h4>
            <ul id="myAccountGen" class="list">
                <li> <a href="account_edit.php">View or change my account information.</a></li>
                <li> <a href="address_book.php">View or change entries in my address book.</a></li>
                <li> <a href="account_password.php">Change my account password.</a></li>
            </ul>
            <?php include 'includes/footer.php'; ?>      
        </div> <!-- container -->
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
</html>