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
include 'includes/flash.php';
include 'includes/db.php';
$db = new db();
//POST
if (isset($_POST['submitted'])) {
    $data = $_POST['user'];
    $db->update('zen_customers', $data, "customers_id = {$_SESSION['user']['customers_id']}");
    $user = $db->find('first', 'zen_customers', "customers_id = {$_SESSION['user']['customers_id']}");
    $_SESSION['user'] = $user;
    $flash->success("Account Details Updated.");
}
$user = $_SESSION['user'];
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
                        <li class="active">Account Edit</li>
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
                    <label class="inputLabel" >First Name:</label>
                    <input type="text" value="<?= $user['customers_firstname'] ?>" name="user[customers_firstname]" required>
                    <br/>
                    <label class="inputLabel" >Last Name:</label>
                    <input type="text" value="<?= $user['customers_lastname'] ?>"name="user[customers_lastname]" required>
                    <br/>
                    <label class="inputLabel" >Email Address:</label>
                    <input type="text" value="<?= $user['customers_email_address'] ?>"name="user[customers_email_address]" required>
                    <br/>
                    <label class="inputLabel" >Telephone:</label>
                    <input type="text" value="<?= $user['customers_telephone'] ?>"name="user[customers_telephone]" required>
                    <br/>
                    <label class="inputLabel">Fax Number:</label>
                    <input type="text" value="<?= $user['customers_fax'] ?>"name="user[customers_fax]" required>
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