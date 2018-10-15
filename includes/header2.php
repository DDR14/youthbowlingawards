<div class="profile row-fluid">
    <h6><span style="font-size: smaller; color: #000;">For more information call us on </span><br>
        <span class="glyphicon glyphicon-earphone" style="font-size: x-large; color: #000;">801-987-8351 </span><br><br>
        <?php        
        $cart = [];
        $pqty = 0;
        $ptotal = 0;
        $customers_id = 0;
        $products_id = 0;
        $customers_basket_quantity = 0;


        if ((isset($_SESSION['user']))) {
            $user = $_SESSION['user'];
            ?>
            <a class="profile" href="my_account.php" title="Account">MY ACCOUNT</a> | 
            <a class="profile" href="viewcart.php"><span class="glyphicon glyphicon-shopping-cart"></span>
                <?php
                $customers_id = $user['customers_id'];
                if (isset($_SESSION['checkout']) == 'true') {
                    $n_val = $_SESSION['checkout'];
                } else {
                    $n_val = 'false';
                }

                $result = $db->raw("SELECT SUM(a.customers_basket_quantity) AS tag_qty
                    FROM zen_customers_basket a 
                    INNER JOIN zen_products b 
                    ON a.products_id = b.products_id 
                    INNER JOIN zen_categories c 
                    ON b.master_categories_id = c.categories_id
                    WHERE customers_id = $customers_id
                    AND (b.master_categories_id = 71
                    OR c.parent_id IN (48, 49, 261, 104))");
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $tag_count_query = $result->fetch();   
                $tag_count = $tag_count_query['tag_qty'];
                $fragment = basename($_SERVER['PHP_SELF']) == 'viewcart.php' ? 'b.products_model, 
                b.products_image,
                d.products_name,
                a.customers_basket_id,
                a.title,
                a.background,
                a.footer,
                a.upload,
                a.customs,' : '';

                $cart = $db->find('all', 'zen_customers_basket a 
                   INNER JOIN zen_products b 
                   ON a.products_id = b.products_id 
                   INNER JOIN zen_products_description d
                   ON d.products_id = a.products_id
                   LEFT JOIN (SELECT MIN(x.discount_price) AS discount_price, 
                   x.products_id FROM zen_products_discount_quantity x
                   INNER JOIN zen_customers_basket y 
                   ON x.products_id = y.products_id
                   WHERE y.customers_id =  :customers_id
                   AND y.customers_basket_quantity >= discount_qty 
                   GROUP BY x.products_id) c
                   ON c.products_id = a.products_id', 'a.customers_id = :customers_id', [
                    'customers_id' => $user['customers_id']
                    ], "a.customers_basket_quantity, 
                    b.products_id,                               
                    b.products_quantity_order_min,
                    {$fragment}
                    IF(ISNULL(c.discount_price),b.products_price,c.discount_price) AS products_price");
                
                foreach ($cart as $key => $row) {
                    if (in_array($row['products_id'], [990, 853]) && $tag_count < 500):
                        $cart[$key]['products_price'] += 1;
                    endif;

                    $pqty += (int) $row['customers_basket_quantity'];
                    $ptotal += $cart[$key]['products_price'] * $row['customers_basket_quantity'];
                }

                echo $pqty . "  ITEM(s)-$" . number_format($ptotal, 2);
                ?></a> | <a class="profile" href="logout.php" title="Logout">LOG-OUT</a> 
                <!-- | <a id="fakeanchor" class="profile" href="#">CHECKOUT</a>-->
                <br/><br/>

                <?php
                $address = $db->find('first', 'zen_customers a 
                    INNER JOIN zen_address_book b  
                    ON a.customers_default_address_id = b.address_book_id
                    LEFT JOIN zen_zones c
                    ON b.entry_zone_id = c.zone_id', 'a.customers_id = :customers_id', [
                        'customers_id' => $user['customers_id']]);

                echo $user['customers_firstname'] . ' ' . $user['customers_lastname'] . '<br/>';
                echo ucfirst($address["entry_street_address"]);
                ?>
                <div><?= ucfirst($address["entry_suburb"]) ?></div>
                <?= ucfirst($address["entry_city"]) ?>,
                <?php
                echo (empty($address["zone_name"]) ? $address["entry_state"] : $address["zone_name"]);
                echo ' ' . $address["entry_postcode"];

            } 
            elseif((!isset($_SESSION['user']))) {
                    $email = "";
                    ?>
                    <a class="profile" href="index.php">HOME</a> 
                    | <a class="profile" href="login.php">LOG-IN</a>
                    | <a class="profile" href="register.php">REGISTER</a> 
                    | <a class="profile" href="viewcart.php"><span class="glyphicon glyphicon-shopping-cart"></span>  
                    <?php

                    $ybaCart = isset($_COOKIE['ybaCart'])?$_COOKIE['ybaCart']:[];

                    $cart = [];

                    foreach ($ybaCart as $key => $val) {    

                        $product_price = $db->find('first',"zen_products AS Product
                            INNER JOIN zen_products_description AS ProductsDescription
                            ON ProductsDescription.products_id = Product.products_id
                            LEFT JOIN (SELECT MIN(x.discount_price) AS discount_price,
                            x.products_id FROM zen_products_discount_quantity x
                            WHERE x.products_id = :pid
                            AND :qty >= x.discount_qty
                            GROUP BY x.products_id) AS ProductsDiscountQuantity
                            ON ProductsDiscountQuantity.products_id = Product.products_id", "Product.products_id = :pid",[
                                'pid'=>$val['products_id'], 'qty'=>$val['customers_basket_quantity']],"Product.require_artwork,
                                Product.products_id,
                                Product.products_weight,
                                Product.master_categories_id,
                                Product.products_model,
                                Product.products_image,
                                Product.products_quantity_order_min,
                                ProductsDescription.products_name,
                                IF(ISNULL(ProductsDiscountQuantity.discount_price),
                                Product.products_price,
                                ProductsDiscountQuantity.discount_price) AS products_price");

                        $cart[$key] = $val + $product_price;

                        foreach ($cart as $key => $row) {
                            if (in_array($row['products_id'], [990, 853]) && $tag_count < 500):
                                $cart[$key]['products_price'] += 1;
                                $cart[$key]['title'];
                            endif;

                            $pqty += (int) $row['customers_basket_quantity'];
                            $ptotal += $cart[$key]['products_price'] * $row['customers_basket_quantity'];
                            $row['title'] = $cart[$key]['title'];
                        }
                    } 

                    echo $pqty . "  ITEM(s)-$" . number_format($ptotal, 2);
                    ?></a>
                    <!-- | <a id="fakeanchor" class="profile" href="#">CHECKOUT</a>-->
                    <br/><br/>

            <?php } ?>
                

        <!--        <form method='post' id='submit_this' name='boost_connect' action='https://www.boostpromotions.com/index.php?main_page=login_as_customer'>
                    <input type='hidden' name='email_addr' value='< $user['customers_email_address'] >'>
                </form>
                <script>
                    $("a#fakeanchor").click(function ()
                    {
                        $("#submit_this").submit();
                        return false;
                    });
                </script>-->
            </h6>
        </div>
        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div style="text-align:left;" class="hidden-xs">
                        <a class="navbar-brand" href="#"><img class="logo" src="images/youthbowlingawards.png" alt="youthbowlingawards-logo" ></a> 
                    </div>
                    <div style="text-align:left;" class="hidden-lg hidden-md hidden-sm">
                        <a class="navbar-brand" href="#"><img class="logo" style="height:80px;" src="images/youthbowlingawards.png" alt="youthbowlingawards-logo"></a> 
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li id="home">
                            <a href="index.php">HOME</a>
                        </li>
                        <li id="awards">
                            <a href="awards.php">AWARDS</a>
                        </li>
                        <li id="products">
                            <a href="products.php?cPath=94">LANYARDS</a>
                        </li>
                        <li id="accessories">
                            <a href="accessories.php">ACCCESSORIES</a>
                        </li>
                        <li>
                            <form class="navbar-form navbar-right" role="search" action="search.php" name="search" method="get">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search" size="12" value="" name="search"> 
                                </div>
                                <button type="submit" class="btn btn-default btn-md" ><span class="glyphicon glyphicon-search"></span></button>
                            </form>
                        </li>                     
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div> <!-- /.container -->
        </nav> <!-- nav -->
        <div class="row-fluid" style="margin-top: 20px; margin-bottom: 20px;">
            <center><img src="images/price banner.png" class="img-responsive"></center>
        </div>



        <!-- chatbox -->
<!-- <a href="#">
    <div class="chatbox">
        <div class="row-fluid"> 
            <label style="font-size:15px;">Chat with Us - Online?</label>
            <span>  </span>
        </div>

    </div> 
</a> -->
<!-- 
<div class="chat_content">
    <div class="row-fluid wells">   
            <label style="font-size:15px;">Chat with Us - Online?</label> 
            <div class="pull-right close_exit"><a href="#" style="text-decoration:none;color:#fff;">X</a></div>
    </div>
    <div class="container_fluid chat_form">  
        <form name="form1">
            <label style="font-size:15px;">Please fill out the form below to start chatting with the next available agent.
            </label>

            <div class="row-fluid">
                <input class="form-control" name="username" type="text" placeholder="*Enter Your Name">
            </div>
            <br>
            <div class="row-fluid">   
                <input class="form-control" name="email" type="email" placeholder="*Enter Your Email">
            </div>
            <br>
            <div class="row-fluid">
                <button type="submit" name="chat_form" class="btn btn-primary btn-lg" onclick="submit_form()">Submit</button>
            </div>

            Enter Your Chat Name: 
            <input type="text" name="uname"><br>
            Your Message: <br>
            <textarea name="msg"></textarea><br>
            <a href="#" onclick="submitchat()">Send</a><br><br>
        <div id="chatlogs">
            LOADING CHATLOGS PLEASE WAIT...
        </div>
        </form>   
    </div>  
</div> 
 
-->

<script type="text/javascript">
// var LHCChatOptions = {};
// LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'www.youthbowlingawards.com'};
// (function() {
// var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
// var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
// var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
// po.src = '//boostpromotions.com/lhc/lhc_web/index.php/chat/getstatus/(click)/internal/(position)/bottom_left/(ma)/br/(check_operator_messages)/true/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
// var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
// })();
</script>