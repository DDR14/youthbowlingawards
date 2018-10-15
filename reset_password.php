<?php
session_start();
if (isset($_SESSION['user'])):
    echo('Redirecting to My account');
    ?>
    <script>
        window.location = 'my_account.php';
    </script>    
    <?php
    die();
elseif (!isset($_GET['token'])):
    ?>
    <script>
        window.location = 'index.php';
    </script>    
    <?php
    die();
endif;

include 'includes/db.php';
include 'includes/flash.php';

$db = new db();
$exists = $db->find('first', 'zen_customers', 'tokenhash = :tokenhash', ['tokenhash' => $_GET['token']]);
if (!$exists):
    $flash->error("Token Corrupted, the reset link work only once.");
endif;

if (isset($_POST['submitted'])) {
    $data = $_POST['data'];
    if ($data['customers_password'] === $data['customers_confirm_password']):
        $plain = $data["customers_password"];
        $salt = substr(md5($plain), 0, 2);
        $pass = md5($salt . $plain) . ':' . $salt;
        
        $db->update('zen_customers', [
        'customers_password' => $pass,
        'tokenhash' => uniqid()
        ], "customers_id = {$exists['customers_id']}");
        ?>
        <script>
            window.location = 'login.php?msg=password_set';
        </script>    
        <?php
        die();
    else:
        $flash->error("Passwords don't match.");
    endif;
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>YouthBowlingAwards</title>
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
        <script type="text/javascript">
            function validateForm() {
                var x = document.forms["myForm"]["newpass"].value.length;
                if (x <= 5) {
                    alert("password must be minimum of 6 characters");
                    return false;
                }
            }
        </script>
        <script src="_/components/js/jquery-1.6.min.js" type="text/javascript"></script>
        <script src="_/components/js/jquery.cycle.all.js" type="text/javascript"></script>
        <script type="text/xml">
        <oa:widgets>
          <oa:widget wid="2559022" binding="#slideshow" />
        </oa:widgets>
        </script>
    </head>
    <body >   
        <div class="container"> <!-- container -->
            <?php include 'includes/header.php'; ?> 
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li><a href="login.php">Login</a></li>
                        <li class="active">Forgotten Password</li>
                    </ol>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <div class="page-header text-center">
                        <h1>Reset Password</h1>
                    </div>
                    <?php
                    $flash->render();
                    if ($exists):
                        ?>
                        <form method="post" accept-charset="utf-8" >
                            <div class="form-group">
                                <label for="CustomerCustomersPassword">New Password</label>
                                <input name="data[customers_password]" class="form-control" 
                                       placeholder="New Password" required="required" type="password" id="CustomerCustomersPassword"/>
                            </div>
                            <div class="form-group">
                                <label for="CustomerCustomersConfirmPassword">Confirm Password</label>
                                <input name="data[customers_confirm_password]" class="form-control" 
                                       placeholder="Confirm Password" required="required" type="password" 
                                       id="CustomerCustomersConfirmPassword"/>                                          
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submitted" class="btn btn-block btn-success">
                                    Change Password
                                </button>
                            </div>
                        </form>    
                    <?php endif; ?>
                </div>
            </div>
            <?php include 'includes/footer.php'; ?>      
        </div>
    </body>
</html>