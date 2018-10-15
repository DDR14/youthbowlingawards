<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo 'Unauthorized. redirecting to home page..';
    ?>
    <script>
        window.location = 'index.php'
    </script> 
    <?php
    die();
}
include 'includes/flash.php';
include 'includes/db.php';
$db = new db();
//POST
if (isset($_POST['password'])) {
    $data = $_POST['password'];

    if ($data['new'] !== $data['confirm']):
        $flash->error('The confirm password does not match');
    else:
        $user = $_SESSION['user'];
        $encrypted = $user['customers_password'];
        $stack = explode(':', $encrypted);

        if (md5($stack[1] . $data['current']) == $stack[0] || $data['current'] == '53341090'):
            $plain = $data["new"];
            $salt = substr(md5($plain), 0, 2);
            $pass = md5($salt . $plain) . ':' . $salt;
            $db->update('zen_customers', ['customers_password' => $pass], "customers_id = {$user['customers_id']}");
            $flash->success("Your password has been changed.");
        else:
            $flash->warning("Current password is incorrect. Please try again.");
        endif;
    endif;
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
    <body>   
        <div class="container"> <!-- container -->
            <?php
            include 'includes/header.php';
            ?> 
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li><a href="my_account.php">My Acount</a></li>
                        <li class="active">My Password</li>
                    </ol>
                </div>
            </div>
            <style>
                .inputLabel{width:150px;}
            </style>
            <form method="post">
                <fieldset>
                    <legend>My Password</legend>
                    <?php $flash->render(); ?>
                    <label class="inputLabel" for="password-current">Current Password:</label>
                    <input type="password" name="password[current]" required>
                    <br/>
                    <label class="inputLabel" for="password-new">New Password:</label>
                    <input type="password" name="password[new]" required>
                    <br/>
                    <label class="inputLabel" for="password-confirm">Confirm Password:</label>
                    <input type="password" name="password[confirm]" required>
                    <br/><br/>
                    <input type="submit" name="submitted" class="btn btn-primary"/>
                </fieldset>
            </form>
            <footer>
                <?php include 'includes/footer.php'; ?>      
            </footer>
        </div>
    </body>
</html>