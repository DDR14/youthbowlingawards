<?php
session_start();
if (!isset($_SESSION['user'])) {
    die('Unauthorized. redirecting to home page..');
    ?>
    <script>
        window.location = 'index.php'
    </script>  
    ?>
    <?php
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
                        <li><a href="my_account.php">MY ACCOUNT</a></li>
                        <li class="active">#<?= $orders_id = $_GET['id']; ?></li>
                    </ol>
                </div>
            </div>
            <h1>Order Information - Order # <?= $orders_id; ?></h1>       
            <div id="customer">
                <?php
                $order = $db->find('first', 'zen_orders', 'orders_id = :orderid AND customers_id = :customers_id', ['orderid' => $orders_id, 'customers_id' => $_SESSION['user']['customers_id']]);
                if (!$order) {
                    die('order not found or unauthorized access. Click back to continue.');
                }
                $charge = $db->find('first', 'boostpr1_tododash.charges', 'orders_id = :orderid', ['orderid' => $orders_id], 'SUM(amount) AS amount_paid');


                $balance = $order['order_total'] - $charge['amount_paid'];
                ?>
                <div class="col-md-7">
                    <table>
                        <tr><th>Billing Address</th><th>Shipping Address</th></tr>
                        <tr>
                            <td>
                                <?=
                                $order['billing_name'] . "</br>"
                                . $order['billing_company'] . "</br>"
                                . $order['billing_street_address'] . "</br>"
                                . $order['billing_suburb'] . "</br>"
                                . $order['billing_city'] . "</br>"
                                . $order['billing_state'] . ", "
                                . $order['billing_postcode'] . "</br>"
                                . $order['billing_country'] . "</br>";
                                ?>
                            </td>
                            <td>
                                <?=
                                $order['delivery_name'] . "</br>"
                                . $order['delivery_company'] . "</br>"
                                . $order['delivery_street_address'] . "</br>"
                                . $order['delivery_suburb'] . "</br>"
                                . $order['delivery_city'] . "</br>"
                                . $order['delivery_state'] . ", "
                                . $order['delivery_postcode'] . "</br>"
                                . $order['delivery_country'] . "</br>";
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5 text-right">
                    <table class="pull-right">
                        <tr>
                            <td class="meta-head">Order #</td>
                            <td><?= $orders_id; ?></td>
                        </tr>
                        <tr>
                            <td class="meta-head">Date</td>
                            <td><?= date("F d, Y"); ?></td>
                        </tr>
                        <tr>
                            <td class="meta-head">Amount Due</td>
                            <td><?= '$' . number_format($balance, 2); ?></td>
                        </tr>
                        <?php if ($order['ponumber'] != null && strpos($order['ponumber'], 'Check (') === false) {
                            ?>
                            <tr>
                                <td class="meta-head">PO Number</td>
                                <td><div class="PO"><?= $order['ponumber']; ?></div></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>                
            <table class="table">
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Unit Cost</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <?php
                $orders_products = $db->find('all', 'zen_orders_products a INNER JOIN naz_custom_co b ON a.orders_products_id = b.orders_products_id', 'orders_id = :orderid', ['orderid' => $orders_id]);

                $subtotal = 0;
                foreach ($orders_products as $row) {
                    $products_model = $row['products_model'];
                    $products_name = $row['products_name'];
                    $products_quantity = $row['products_quantity'];
                    $total_price = $row['products_price'] * $products_quantity;
                    $subtotal += $total_price;

                    $final_price = '$' . number_format($row['products_price'], 2);
                    $total_price = '$' . number_format($total_price, 2);

                    // Check if the products model is stock modifeid or custom for new boost site
                    $type = 'others';
//                    if (!in_array($products_model, ['CUSTOM-BAG-TAG', 'CUSTOM-SPIRIT-TAG', 'CUSTOM-JR-BAG-TAG', 'CUSTOM-SHAPE-TAG', 'CUSTOM-SKINNY-TAG', 'CUSTOM-SHAPE-BAG-TAG', 'CUSTOM-BRAG-TAG'])):
                    $products_model_array = explode("-", $products_model);
                    if (in_array('STOCK', $products_model_array)) {
                        $type = 'stock';
                    } elseif (in_array('MODIFIED', $products_model_array)) {
                        $type = 'modified';
                    } elseif (in_array('CUSTOM', $products_model_array)) {
                        $type = 'custom';
                    }
//                    endif;

                    if ($type != 'others'):
                        $customs = $db->find('all', 'naz_custom_co', 'order_id = :orderid AND model = :model', ['orderid' => $orders_id, 'model' => $products_model]);
                        ?>
                        <tr>
                            <td><?= $products_model ?></td>
                            <td>
                                <?php
                                if ($type == 'modified') {
                                    $label = 'Modifications';
                                } elseif ($type == 'custom') {
                                    $label = 'Customizations';
                                } else {
                                    $label = null;
                                }
                                ?>
                                <?php if (!is_null($label)): ?>
                                    <p>
                                        <?php
                                        echo (!empty($row['title'])) ? "Title: " . $row['title'] . "<br />" : "";
                                        echo (!empty($row['background'])) ? "Background: " . $row['background'] . "<br />" : "";
                                        echo (!empty($row['footer'])) ? "Footer: " . $row['footer'] . "<br />" : "";
                                        echo (!empty($row['upload'])) ? "Uploaded Image: <a target='_blank' href='http://boostpromotions.com/" . $row['upload'] . "'>" . $row['upload'] . "</a><br />" : "";
                                        ?>
                                    </p>

                                <?php endif; ?>

                                <?php if ($type != 'custom'): ?>
                                    <br />
                                    <p>Image:<br />
                                        <?= $row['customs'] ?>
                                    </p>
                                <?php else: ?>
                                    <p>Custom:
                                        <?= $row['customs'] ?>
                                    </p>
                                <?php endif; ?>

                            </td>
                            <td><?= $final_price ?></td>
                            <td><?= $products_quantity ?></td>
                            <td><?= $total_price ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td class="item-name"><?= $products_model; ?></td>
                            <td class="description"><?= $products_name; ?></td>
                            <td><?= $final_price; ?></td>
                            <td><?= $products_quantity; ?></td>
                            <td><span class="price"><?= $total_price; ?></span></td>
                        </tr>
                    <?php endif; ?>

                    <?php
                }
                if ($order['onetime_charges'] != 0) {
                    ?>
                    <tr>
                        <td colspan="2" class="blank"> </td>
                        <td colspan="2" class="total-line">One Time Charges:</td>
                        <td class="total-value"><?= '$' . number_format($order['onetime_charges'], 2); ?></td>
                    </tr>
                    <?php
                }

                $order_totals = $db->find('all', 'zen_orders_total', 'orders_id = :orderid ORDER BY sort_order', ['orderid' => $orders_id]);

                foreach ($order_totals as $order_total):
                    ?>
                    <tr>
                        <td colspan="2" class="blank"> </td>
                        <td colspan="2" class="total-line"><?= $order_total['title']; ?></td>
                        <td class="total-value"><?= $order_total['text']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" class="blank"></td>
                    <td colspan="2" class="total-line">Amount Paid</td>
                    <td class="total-value"><?= '$' . number_format($charge['amount_paid'], 2); ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line balance">Balance Due</td>
                    <td class="total-value balance"><?= '$' . number_format($balance, 2); ?></td>
                </tr>
            </table>

            <h4>Status History & Comments</h4>
            <table class="table">
                <thead>
                <th>Date</th>
                <th>Order Status</th>
                <th>Comments</th>
                </thead>
                <tbody>
                    <?php
                    $order_history = $db->find('all', 'zen_orders_status_history a 
                            INNER JOIN zen_orders_status b
                            ON a.orders_status_id = b.orders_status_id', "a.orders_id = $orders_id ORDER BY a.date_added DESC");
                    foreach ($order_history as $oh) {
                        ?>
                    <tr>
                        <td><?= $oh['date_added']; ?></td>
                        <td><?= $oh['orders_status_name'] ?></td>
                        <td><?= $oh['comments'] ?></td>
                    </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

            <?php include 'includes/footer.php'; ?>     

        </div> <!-- container -->
    </body>
</html>
