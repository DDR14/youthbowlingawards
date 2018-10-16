<?php
session_start();
include 'includes/db.php';
$db = new db();
$prompt = '';
if (isset($_POST['submitted'])):
    $quantity = $_POST['quantity'];
    $products_id = $_POST['products_id'];

    if (isset($_SESSION['user'])) {
        $db->raw("UPDATE zen_customers_basket SET customers_basket_quantity='$quantity' WHERE products_id='$products_id'");
    } else {
        setcookie("ybaCart[" . $products_id . "][customers_basket_quantity]", $quantity, time() + (86400 * 30), "/");
        $_COOKIE['ybaCart'][$products_id]['customers_basket_quantity'] = $quantity; //band aid solution TODO:: look for cookie wrapper
    }
    $prompt = 'Quantity Updated';
endif;

if (isset($_POST['delete'])):
    if (isset($_SESSION['user'])) {
        $db->delete('zen_customers_basket', 'customers_basket_id=:customers_basket_id', [
            'customers_basket_id' => $_POST['customers_basket_id']]);
    } else {
        foreach ($_COOKIE['ybaCart'][$_POST['products_id']] as $k => $v) {
            setcookie('ybaCart[' . $_POST['products_id'] . '][' . $k . ']', '', time() - 1000, '/');
        }
        unset($_COOKIE['ybaCart'][$_POST['products_id']]);
    }

    $prompt = 'Item Deleted';
endif;
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
    <body id="viewcart">
        <div class="container"> <!-- container -->
            <?php include 'includes/header.php'; ?>   
            <div class="row"> <!-- breadcrumb -->
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php?cPath=105">Products</a></li>
                        <li><a href="#">Products Info</a></li>
                        <li class="active">View Cart</li>
                    </ol>
                </div>
            </div> <!-- breadcrum container -->
            <div class="container-fluid"> <!-- start of content -->
                <?php if ($prompt): ?>
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $prompt ?>
                    </div>
                    <?php
                    $prompt = '';
                endif;
                ?>
                <div class="col-sm-12" style="border-radius:15px;background-color:F5FAFF;"> <!-- col-sm10 -->
                    <div class="container-fluid table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <td>Image</td>
                            <td>Item Name</td>
                            <td>Product ID</td>
                            <td>Quantity</td>
                            <td>unit</td>
                            <td>total</td>
                            </thead>
                            <tbody>
                                <?php
                                if (count($cart) > 0) {
                                    // output data of each row
                                    foreach ($cart as $row) {
                                        $price = $row['products_price'];
                                        $total = number_format($row['customers_basket_quantity'] * $price, 2);
                                        $qty = ($row['customers_basket_quantity']);
                                        $products_min = ($row['products_quantity_order_min']);
                                        if ($row['require_artwork']) {
                                            $title = $row['title'];
                                            $background = $row['background'];
                                            $footer = $row['footer'];
                                            $upload = $row['upload'];
                                            $customs = $row['customs'];
                                        }
                                        ?>
                                    <form method='post'>
                                        <tr>
                                            <?php
                                            if ($qty < $products_min) {
                                                $itm = "true";
                                                echo "<h6 style='color:red;'>{$row["products_name"]} {$row["products_model"]} minimum QTY is $products_min</h6>";
                                            }
                                            ?>                                            
                                            <td valign='center'>
                                                <a href='productsinfo.php?products_id=<?= $row["products_id"]; ?>'>
                                                    <img style='height:50px;' class='tag' src='http://50.87.226.168/images/<?= $row["products_image"] ?>'>
                                                </a>
                                            </td>
                                            <td valign='center'>
                                                <strong><?= $row["products_name"] ?></strong>
                                                <?php if ($row['require_artwork']): ?>
                                                    <br>
                                                    Title: <?= $title ?><br>
                                                    Background: <?= $background ?><br>
                                                    Footer: <?= $footer ?><br>
                                                    Upload: <a href='http://50.87.226.168/images/uploads/<?= $upload ?>' target="_blank"><?= $upload ?></a><br>
                                                    Customs: <?= $customs ?>
                                                <?php endif; ?>
                                            </td>
                                            <td valign='center'><?= $row['products_id'] ?>
                                                <input type='hidden' name='products_id' value='<?= $row['products_id'] ?>' size='5' />
                                            </td>     
                                            <td valign='midlle'>                                      
                                                <?php
                                                if ($qty >= $products_min):
                                                    echo "<input type='text' name='quantity' value='{$row['customers_basket_quantity']}' size='3'>";
                                                else:
                                                    echo "<h6 style='color:red;width:bold;'>" . " * <input type='text' name='quantity' value='{$row['customers_basket_quantity']}' size='5'>" . "</h6>";
                                                endif;
                                                ?></td>

                                            <td valign='center'><?= "$" . number_format($price, 2) ?></td>
                                            <td valign='center'><?= "$" . $total ?></td>
                                            <td valign='center'><button name='submitted' type='submit' class='btn btn-primary btn-xs'>update</button><br><br>
                                                <?php if (isset($_SESSION['user'])): ?>
                                                    <input type='hidden' name='customers_basket_id' value='<?= $row['customers_basket_id'] ?>'/>
                                                <?php endif; ?>
                                                <button name='delete' type='submit' onClick='return confirm("you are about to delete an item?");' 
                                                        class='btn btn-default btn-xs'><img style ='height:20px;' src='images/trash.png'></button>                            
                                        </tr>
                                    </form><?php
                                }
                            } else {
                                echo "Your Shopping Cart is empty.";
                            }
                            ?>                                 
                            </tbody>
                            <tfoot>
                            <th colspan="6" style="text-align: right">Subt-Total: </th><th>$<?= number_format($ptotal, 2); ?></th>
                            </tfoot>
                        </table>  
                    </div>
                    <div class="row">
                        <a href='products.php?cPath=105'><button type='button' class='btn btn-primary btn-md' value='back'>Shop more</button></a>
                        <?php
                        if (isset($_SESSION['user'])):
                            //for cross domain validation
                            $token = sha1("5b2cb166644ef" . $_SESSION['user']['customers_email_address'] . date('Ymd'));
                            ?>

                            <button class='pull-right btn btn-success btn-md' type='submit' name='checkout' data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-credit-card"></span>
                                CHECKOUT</button>

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header alert-success">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><span class="glyphicon glyphicon-credit-card"></span> Checkout</h4>
                                        </div>
                                        <div class="modal-body text-center">
                                            You will be redirected to our parent site BoostPromotions.com to complete the checkout process.
                                            <br/>
                                            <img src="images/youthbowlingawards.png" alt="youthbowlingawards" height="150" >
                                            <img src="images/right-double-chevron.png" alt="youthbowlingawards" >
                                            <img src="https://boostpromotions.com/img/logo.png" alt="boostpromotions" height="80" >
                                        </div>
                                        <div class="modal-footer">
                                            <form method='post' id='submit_this' name='boost_connect' action='https://boostpromotions.com/shoppingCart/login_as_customer'>
                                                <input type='hidden' name='token' value='<?= $token ?>'>
                                                <input type='hidden' name='email_addr' value='<?= $_SESSION['user']['customers_email_address'] ?>'>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Continue</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>  
                            <a href="login.php" ><button class='pull-right btn btn-success btn-md' type='submit' name='checkout' data-toggle="modal" data-target="#myModal">
                                    <span class="glyphicon glyphicon-credit-card"></span>
                                    CHECKOUT</button></a>
                        <?php endif; ?>     
                    </div>
                </div> <!-- col-sm10 -->      
            </div> <!-- end of content -->
            <?php include 'includes/footer.php'; ?>  
        </div> <!-- container -->
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
</html>
