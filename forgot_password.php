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

if (isset($_POST['submitted'])) {
    $db = new db();
    $email = $_POST['data']['customers_email_address'];
    if (empty($email)) {
        $flash->error('Please Provide the Email Adress that you used to Register with us');
    } else {
        $fu = $db->find('first', 'zen_customers', 'customers_email_address = :email', ['email' => $email]);
        if ($fu) {
            $key = uniqid();
            $hash = sha1($fu['customers_lastname'] . rand(0, 100));
            $url = 'http://youthbowlingawards.com/reset_password.php?token=' . $key . '#' . $hash;
            $ms = wordwrap($url, 1000);

            if ($db->update('zen_customers', ['tokenhash' => $key], "customers_id = {$fu['customers_id']}")) {

                //============Email================//
                $resetpw = '<p>Click on the link below to Reset Your Password </p><br/>
<a href="' . $ms . '">Click here to Reset Your Password</a><br/>
<pre>or Visit this Link</pre><br/>
<p><a href="<?php echo $ms; ?>">' . $ms . '</a></p>';

                
                $headers = "From: no-reply@youthbowlingawards.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                mail($email, "Reset your BoostPromotions.com password", $resetpw, $headers);

                $flash->success('Please check your email for the password reset link. Thank you.');
            } else {
                $flash->error("Error Generating Reset link");
            }
        } else {
            $flash->error('Email does Not Exist');
        }
    }
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
                        <h1>Password Forgotten</h1>
                        <p>Enter your email address and we will send you a password reset link.</p>
                    </div>
                    <?php $flash->render(); ?>
                    <form method="post" accept-charset="utf-8" >
                        <div class="form-group">
                            <div class="input email required">
                                <label for="CustomerCustomersEmailAddress">Email address</label>
                                <input name="data[customers_email_address]" class="form-control" 
                                       placeholder="Email address" required="required" maxlength="96" 
                                       type="email" id="CustomerCustomersEmailAddress"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submitted" class="btn btn-block btn-success">
                                Send
                            </button>
                        </div>
                    </form>    
                </div>
            </div>
            <?php include 'includes/footer.php'; ?>      
        </div>
    </body>
</html>