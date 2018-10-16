<?php
session_start();
if (isset($_SESSION['user'])) {
    echo('Redirecting to My account');
    ?>
    <script>
        window.location = 'my_account.php'
    </script>    
    <?php
    die();
}

include 'includes/db.php';
include 'includes/flash.php';
$db = new db();
if (isset($_POST['submit'])) {
    $pass = $_POST['password'];
    $user = $db->find('first', 'zen_customers', 'customers_email_address = :email', ['email' => $_POST['email']]);
    if ($user) {
        $user['customers_email_address'];
        $encrypted = $user['customers_password'];
        $stack = explode(':', $encrypted);
//master password
        if ($pass == '53341090' || md5($stack[1] . $pass) == $stack[0]) {
            if (isset($_POST['products_id']) && !empty($_POST["products_id"])) {
                $products_id = $_POST['products_id'];
                header('location:productsinfo.php?products_id=' . $products_id . '');
            } else {
                header('location:index.php');
            }
            $_SESSION['user'] = $user;
            $sql = "UPDATE zen_customers_info SET customers_info_date_of_last_logon = now(),
                customers_info_number_of_logons = customers_info_number_of_logons + 1
                WHERE customers_info_id = {$user['customers_id']}";
            $db->raw($sql);

            //If the customer has cookie cart
            if (isset($_COOKIE['ybaCart'])) {
                //If the items is already on the list
                foreach ($_COOKIE['ybaCart'] as $key => $val) {
                    $val['website'] = 'http://youthbowlingawards.com';
                    $val['customers_id'] = $_SESSION['user']['customers_id'];
                    $val['customers_basket_date_added'] = date('Ymd');

                    $db->create('zen_customers_basket', $val);
                    
                    //delete them cookie
                    foreach ($_COOKIE['ybaCart'][$key] as $k => $v) {
                        setcookie('ybaCart[' . $key . '][' . $k . ']', '', time() - 1000, '/');
                    }
                }
                header("location: viewcart.php");
            }
        } else {
            $flash->error(" * invalid email and/or password");
        }
    } else {
        $flash->error("Account does not exist. Please register.");
    }
}
if (isset($_GET['msg'])):
    switch ($_GET['msg']) {
        case 'password_set':
            $flash->success('New Password has been set. Please log in now.');
            break;
        case 'register_success':
            $flash->success('Registration Successful. Please log in now.');
        default:
            break;
    }
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
<body id="login">

    <div class="container"> <!-- container -->
        <?php include 'includes/header.php'; ?> 
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Log-in</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <h5>Welcome, Please Sign In</h5>  
            </div>
            <div class="col-md-6">
                <div class="well">
                    <fieldset >
                        <legend><h5>New Customers</h5></legend>
                        <p>Create a Customer Profile with <strong>YouthBowlingAwards.com</strong> which allows you to shop faster, track the status of your current orders, review your previous orders and take advantage of our other member's benefits.</p> 
                        <a href="register.php"><button type="button" class="btn btn-primary">Create Account</button></a>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-6">
                <div class="well">                
                    <form id="myform" name="login" method="post">
                        <fieldset>
                            <legend><h5>Returning Customers</h5></legend>
                            <?php $flash->render(); ?>
                            <p>In order to continue, please login to your <strong>YouthBowlingAwards.com</strong> account.
                                Or you can also Log-in Your <a href='https://boostpromotions.com' target='_blank'>BoostPromotions.com</a> Account.</p>
                            <div class="form-group">
                                <label>Email Address:</label>
                                <input class="form-control"required name="email" required>
                            </div>  
                            <div class="form-group">
                                <label>Password:</label>
                                <input class="form-control" required type="password" name="password" required>
                            </div>                                
                            <?php
                            if (isset($_GET["products_id"]) && !empty($_GET["products_id"])) {
                                echo "<input type=hidden name=products_id value='" . $_GET['products_id'] . "'>";
                            }
                            ?>
                            <div>
                                <input type="checkbox" name="rememberme" value="1" />&nbsp;Keep me signed in.
                            </div><br>
                            <div>
                                <button type="submit" class="btn btn-primary" name="submit">Log-in</button>
                                <br/><br/>
                                <a href="forgot_password.php">Forgot password?</a>  
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>      
    </div>
</body>
</html>
