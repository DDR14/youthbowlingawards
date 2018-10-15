<?php
session_start();
if(!isset($_GET['products_id'])):
    echo 'No Product ID specified. Redirecting to homepage.';
    header('location:index.php');
endif;

include 'includes/db.php';
include 'includes/flash.php';
$db = new db();
if (isset($_POST['addtocart'])):
    $data = $_POST['data'];

    if ($data['customers_basket_quantity'] < $_POST['minqty']):
        $flash->error("Please order a minimum of " . $_POST['minqty']);
    else:  
        if (isset($_FILES['uploadfile']) && file_exists($_FILES['uploadfile']['tmp_name']) 
                && is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
            $folder = "../images/uploads/";
            $data['upload'] = substr(md5(rand(1, 99999)), 0, 6) . "." . $_FILES["uploadfile"]["name"];
            move_uploaded_file($_FILES['uploadfile']['tmp_name'], $folder . $data['upload']);
        }

        $exists = $db->find('first', 'zen_customers_basket', 'products_id = :products_id
        AND customers_id = :customers_id', [
            'products_id' => $data['products_id'],
            'customers_id' => $_SESSION['user']['customers_id']
        ]);
        if ($exists) {
            $data['customers_basket_quantity'] += $exists['customers_basket_quantity'];

            $db->update('zen_customers_basket', $data, 'customers_basket_id = :cbid', ['cbid' => $exists['customers_basket_id']]);
        } else {
            $data['website'] = 'http://youthbowlingawards.com';
            $data['customers_id'] = $_SESSION['user']['customers_id'];
            $data['customers_basket_date_added'] = date('Ymd');

            $db->create('zen_customers_basket', $data);
        }
        header('location:viewcart.php');
    endif;
endif;

if (isset($_POST['add'])):
    $data = $_POST['data'];

    $cookie_id = 0;

    if(isset($_COOKIE['ybaCart'])){
        $cookie_id = count($_COOKIE['ybaCart']);
    }

    // setcookie("ybaCart[" . ($cookie_id + 1) ."][prod]", $data['products_id'], time() + (60 * 5), "/"); //5 Minutes

    $product_id = $_COOKIE["ybaCart[".($cookie_id + 1)."][products_id]"];

    if($data['products_id'] === $products_id)
    {
        setcookie("ybaCart[" . ($cookie_id + 1) . "][cookie_id]", $cookie_id + 1, time() + (60 * 5), "/"); //5 Minutes

        setcookie("ybaCart[" . ($cookie_id + 1) . "][products_id]", $data['products_id'], time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($cookie_id + 1) . "][customers_basket_quantity]", $data['customers_basket_quantity'] + $_COOKIE["ybaCart[".($cookie_id)."][customers_basket_quantity]"], time() + (60 * 5), "/"); //5 Minutes

        if(empty($data['title'])){
            setcookie("ybaCart[" . ($cookie_id + 1) . "][title]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) . "][title]", $data['title'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['background'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][background]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][background]", $data['background'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['footer'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][footer]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][footer]", $data['footer'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['upload'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][upload]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][upload]", $data['upload'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['customs'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][customs]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][customs]", $data['customs'], time() + (60 * 5), "/"); //5 Minutes
        }
        
    }else{

        setcookie("ybaCart[" . ($cookie_id + 1) . "][cookie_id]", $cookie_id + 1, time() + (60 * 5), "/"); //5 Minutes

        setcookie("ybaCart[" . ($cookie_id + 1) . "][products_id]", $data['products_id'], time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($cookie_id + 1) . "][customers_basket_quantity]", $data['customers_basket_quantity'], time() + (60 * 5), "/"); //5 Minutes

        if(empty($data['title'])){
            setcookie("ybaCart[" . ($cookie_id + 1) . "][title]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) . "][title]", $data['title'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['background'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][background]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][background]", $data['background'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['footer'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][footer]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][footer]", $data['footer'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['upload'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][upload]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][upload]", $data['upload'], time() + (60 * 5), "/"); //5 Minutes
        }

        if(empty($data['customs'])){
            setcookie("ybaCart[" . ($cookie_id + 1) ."][customs]", " ", time() + (60 * 5), "/"); //5 Minutes
        }else{
            setcookie("ybaCart[" . ($cookie_id + 1) ."][customs]", $data['customs'], time() + (60 * 5), "/"); //5 Minutes
        }
        
    }
    
    header('location:viewcart.php');
    
endif;

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
</head>
<body id="productsinfo">
    <div class="container">    <!-- container -->
        <?php
        include 'includes/header.php';        
        
        $products_id = $_GET['products_id'];
        $row = $db->find('first', "zen_products a 
            INNER JOIN zen_products_description b 
            ON a.products_id = b.products_id
            LEFT JOIN zen_customers_basket c
            ON a.products_id = c.products_id
            AND c.customers_id = $customers_id", 'a.products_id = :products_id', ['products_id' => $products_id]);

        if (!$row) {
            die('Product doesn`t exist. Click Back to continue.');
        }
        
        //for breadcrumb
        $category = $db->find('first', 'zen_categories_description', 'categories_id = :cid', ['cid' => $row['master_categories_id']]);
        
        $products_image = $row['products_image'];
        $products_description = $row['products_description'];
        $products_name = $row['products_name'];
        $products_model = $row['products_model'];
        $products_price = $row['products_price'];
        $minqty = $row['products_quantity_order_min'];
        $require_artwork = $row['require_artwork'];
        ?> 
        <div class="row"> <!-- breadcrumb -->
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="products.php?cPath=<?= $row['master_categories_id']; ?>"><?= $category['categories_name'] ?></a></li>
                    <li class="active"><?= $products_name; ?></li>
                </ol>
            </div>
        </div> <!-- breadcrum container -->
        <?php $flash->render(); ?>
        <div class="row"> 
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-7" style="text-align:center;">
                        <?php
                        echo "<img class='img-responsive container-fluid' src='http://50.87.226.168/images/$products_image' />
<h6>$products_model</h6><p>$products_name</p>";
                        ?>                        
                    </div>
                    <div class="col-sm-5">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th style="text-align:center;" colspan="5">
                                    <?php if (in_array($products_id, [990, 853])): ?>
                                        <strong>With Tag Order*</strong>
                                    <?php else: ?>
                                        <strong>QTY Discounts Price Breakdown</strong>
                                    <?php endif; ?>
                                </th>
                            </tr><?php
                            $result = $db->find('all', 'zen_products_discount_quantity', 'products_id = :products_id', ['products_id' => $products_id]);
                            $pdqs = [];
                            $pdqs[] = ['qty' => $minqty, 'price' => $products_price];
                            foreach ($result as $dis) {
                                $pdqs[] = ['qty' => $dis['discount_qty'], 'price' => $dis['discount_price']];
                            }
                            //display assembled
                            foreach ($pdqs as $pdq) {
                                echo "<tr><td>" . $pdq['qty']
                                . "+</td><td>$"
                                . number_format($pdq['price'], 2) . "</td></tr>";
                            }
                            if (in_array($products_id, [990, 853])):
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="5">
                                        <strong>Without Tag Order</strong>
                                    </th>
                                </tr>
                                <?php
                                //display assembled
                                foreach ($pdqs as $pdq) {
                                    echo "<tr><td>" . $pdq['qty']
                                    . "+</td><td>$"
                                    . number_format($pdq['price'] + 1.0000, 2) . "</td></tr>";
                                }
                            endif;
                            ?>
                        </table>
                        <?php
                        if (in_array($products_id, [990, 853])) {
                            echo "<label class='text-warning'>*MINIMUM of 500 TAGS must be included with this order or the pricing will be $1.00 more per lanyard.</label>";
                        }
                        ?>
                    </div>
                </div>
            </div> 
            <div class="col-sm-7">
                <h4><strong><?php echo $products_name; ?></strong></h4>
                <p><?= $products_description; ?></p>
                <div class="well" >
                    <form method="post" name="Form" action="" enctype="multipart/form-data">
                        <?php if ($require_artwork): ?>
                            <ul class="list-unstyled">
                                <li id="<?php
                                if (isset($customers_id)) {
                                    echo $customers_id;
                                } else {
                                    echo "empty1";
                                }
                                ?>"><label>Would you like to change the <b>title</b> for this tag?</label>
                                    <input type="radio" name="button1" id="b1hide" checked /> No
                                    <input type="radio" name="button1" id="b1show"/> Yes
                                    <p id="p1">Tell us what you would like to change the title to, or list the tag number with the title you want.</p>
                                    <textarea class="form-control" type="text" name="data[title]" id="title"><?= $row['title'] ?></textarea>
                                </li>
                                <li id="<?php
                                if (isset($customers_id)) {
                                    echo $customers_id;
                                } else {
                                    echo "empty2";
                                }
                                ?>"><label>Would you like to change the <b>background</b> for this tag?</label>
                                    <input type="radio" name="button2" id="b2hide" checked /> No
                                    <input type="radio" name="button2" id="b2show"/> Yes
                                    <p id='p2'>Describe to us what you would like to change the background to, or list the tag number with the background you want.</p>
                                    <textarea class="form-control" type="text" name="data[background]" id="background"><?= $row['background'] ?></textarea>
                                </li>
                                <li id="<?php
                                if (isset($customers_id)) {
                                    echo $customers_id;
                                } else {
                                    echo "empty3";
                                }
                                ?>"><label>Would you like to change the <b>image</b> for this tag?</label>
                                    <input type="radio" name="button3" id="b3hide" checked /> No
                                    <input type="radio" name="button3" id="b3show"/> Yes
                                <li id="choose">
                                    <input type="radio" name="upload" id="upload" value="upload">upload</input>
                                    <input type="radio" name="upload" id="describe" value="" checked>describe</input>
                                    <p id="p3">Tell us what you would like to change the image to, or list the tag number with the title you want.</p>
                                    <textarea class="form-control" type="text" name="data[customs]" id="image_describe"><?= $row['customs'] ?></textarea>
                                    <p id="p_image">Would you like to upload an image with that?</p>
                                    <input type="file" name="uploadfile" id="image_upload">
                                    <input type='hidden' name='data[upload]'  value='<?= $row['upload'] ?>'
                                           />
                                </li>
                                <li id="<?php
                                if (isset($customers_id)) {
                                    echo $customers_id;
                                } else {
                                    echo "empty4";
                                }
                                ?>"><label>Do you want a <b>footer</b> for this tag?</label>
                                    <input type="radio" name="button4" id="b4hide" checked /> No
                                    <input type="radio" name="button4" id="b4show"/> Yes
                                    <p id="p4"> Describe to us what you would like on the footer, or list the tag number with the footer you want.</p>
                                    <textarea class="form-control" type="text" name="data[footer]" id="footer"><?= $row['footer'] ?></textarea>
                                </li>
                            </ul>
                            <?php
                        else:
                            echo "<input type='hidden' name='upload'>";
                        endif;
                        ?>
                        <?php echo "<input type='hidden' name='data[products_id]' value='$products_id'>
                              <input type='hidden' name='minqty' value='$minqty'>"; ?>

                        <br/>
                        <br/>
                        <div class="form-inline">
                            <label id="<?php
                            if (isset($customers_id)) {
                                echo $customers_id;
                            } else {
                                echo "empty5";
                            }
                            ?>">Quantity:</label>
                            <!--min value from db-->
                            <input type="number" name="data[customers_basket_quantity]" 
                                   min='<?= $minqty; ?>'
                                   placeholder="<?php echo "Minimum Quantity" . " " . $minqty; ?>" 
                                   id="<?= isset($customers_id) ? $customers_id : "empty6" ?>" 
                                   class="form-control" size="10" value="<?php echo $minqty; ?>" />
                                   <?php
                                   if (isset($_SESSION['user'])) {
                                       echo "<button class='btn btn-success' type='submit' name='addtocart'>Add To Cart</button>";
                                   } else {
                                       echo "<button class='btn btn-success' type='submit' name='add'>Add</button>";
                                
                            }
                            ?>
                            <label style="color:red;"><?php echo "Minimum Quantity: " . $minqty; ?></label>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- row-fluid end of content -->
        <?php include 'includes/footer.php'; ?>  
    </div> <!-- container -->
    <script type="text/javascript">//loading script
        $(window).load(function () {
            $(".loader").fadeOut("slow");
        })
// clear fields
        function myFunction() {
            document.getElementById("myform").reset();
        }
// title tags
        $(document).ready(function () {
            $("#empty1").hide();
            $("#empty2").hide();
            $("#empty3").hide();
            $("#empty4").hide();
            $("#empty5").hide();
            $("#empty6").hide();
            $("#p1").hide();
            $("#title").hide();
        })
        $(document).ready(function () {
            $("#b1hide").click(function () {
                var textarea = document.getElementById('title');
                $("#title").hide();
                $("#p1").hide();
                textarea.value = '';
            });
            $("#b1show").click(function () {
                $("#title").show();
                $("#p1").show();
            });
        });
// background tags
        $(document).ready(function () {
            $("#p2").hide();
            $("#background").hide();
        })
        $(document).ready(function () {
            var textarea = document.getElementById('background');

            $("#b2hide").click(function () {
                $("#background").hide();
                $("#p2").hide();
                textarea.value = '';
            });
            $("#b2show").click(function () {
                $("#background").show();
                $("#p2").show();
            });
        });
// images tag
        $(document).ready(function () {
            $("#choose").hide();
        })
        $(document).ready(function () {
            $("#b3hide").click(function () {
                var textarea = document.getElementById('image_describe');
                $("#choose").hide();
                textarea.value = '';
            });
            $("#b3show").click(function () {
                $("#choose").show();
                $("#upload").show();
                $("#describe").show();
                $("#p_image").hide();
                $("#image_upload").hide();
            });
        });
        $(document).ready(function () {
            $("#upload").click(function () {
                $("#p_image").show();
                $("#image_upload").show();
                $("#p3").hide();
                $("#image_describe").hide();
                var textarea = document.getElementById('image_describe');
                textarea.value = '';

            })
        })
        $(document).ready(function () {
            $("#describe").click(function () {
                $("#p_image").hide();
                $("#image_upload").hide();
                $("#p3").show();
                $("#image_describe").show();
            })
        })
// footer
        $(document).ready(function () {
            $("#p4").hide();
            $("#footer").hide();
        })


        $(document).ready(function () {

            $("#b4hide").click(function () {
                var textarea = document.getElementById('footer');
                $("#footer").hide();
                $("#p4").hide();
                textarea.value = '';
            });
            $("#b4show").click(function () {
                $("#footer").show();
                $("#p4").show();
            });
        });

    </script>
</body>