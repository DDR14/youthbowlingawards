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
include 'includes/form.php';
$db = new db();

if (isset($_POST['submit'])) {
    // validate email
    $exists = $db->find('first', 'zen_customers', 'customers_email_address = :email', ['email' => $_POST['customer']['customers_email_address']]);
    if ($exists) {
        $errors['customer']['customers_email_address'] = " * email already exist!..";
        $flash->error(" * email already exist!..");
    }

    //validate zone
    $zone_id = '';
    $state_province = trim(ucfirst(strtolower($_POST['address']['entry_state'])));
    if ($_POST['address']['entry_country_id'] == 223) {
        $statedb = $db->find('first', 'zen_zones', "zone_name = '$state_province' OR zone_code = '$state_province'");
        if (!$statedb) {
            $errors['address']['entry_state'] = "Not a Valid US State";
            $flash->error('Not a Valid US State');
        }
        $zone_id = $statedb['zone_id'];
    }

    // validate password
    $plain = $_POST['form']['password'];
    $password2 = $_POST['form']['confirm_password'];
    if ($plain != $password2) {
        $errors['form']['password'] = " * Password do not match";
        $flash->error(" * Password do not match");
    }

    if (!$errors) {
        // INSERT CUSTOMER
        $salt = substr(md5($plain), 0, 2);
        $pass = md5($salt . $plain) . ':' . $salt;
        $_POST['customer'] += [
            'customers_firstname' => $_POST['address']['entry_firstname'],
            'customers_lastname' => $_POST['address']['entry_lastname'],
            'customers_password' => $pass,
            'customers_country' => $_POST['address']['entry_country_id'],
            'customers_state' => $_POST['address']['entry_state'],
            'customers_gender' => $_POST['address']['entry_gender']
        ];
        $last_id = $db->create("zen_customers", $_POST['customer']);

        // INSERT ADDRESS BOOK
        $_POST['address'] += [
            'customers_id' => $last_id,
            'entry_zone_id' => $zone_id
        ];
        $lastinsert_id = $db->create('zen_address_book', $_POST['address']);

        $db->raw("INSERT INTO zen_customers_info(customers_info_source_id, customers_info_id, customers_info_date_of_last_logon, customers_info_number_of_logons, customers_info_date_account_created ) 
        VALUES ({$_POST['info']['sources_id']} ,'$last_id', now(), '1', now())");

        $db->raw("UPDATE zen_customers SET customers_default_address_id = '$lastinsert_id'
        WHERE customers_id = '$last_id'");

        $message = file_get_contents('email/email_template_welcome.html');
        $str = str_replace("CUSTOMERS_NAME", $_POST['customer']['customers_firstname'], $message);
        $subject = "Welcome to YouthBowlingAwards.com";
        $message2 = $_POST['customer']['customers_email_address'] . $_POST['customer']['customers_lastname'] . $last_id;
        $to = $_POST['customer']['customers_email_address'];
        $headers = "From: support@youthbowlingawards.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to, $subject, $str, $headers);
        mail('elvis@meristone.com', 'New User Registered', $message2, $headers);

        header('location:login.php?msg=register_success');
    }
}
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
<body id="createacct">   
    <div class="container"> <!-- container -->
        <?php
        include 'includes/header.php';

        $countries = $db->find('all', 'zen_countries', '', [], 'countries_id, countries_name');
        $sources = $db->find('all', 'zen_sources', '', [], 'sources_id, sources_name');
        ?> 
        <div class="row">            
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Create Account</li>
                </ol>
            </div>
        </div>
        <h1>MY ACCOUNT INFORMATION</h1>
        <p class="text-info">NOTE: If you already have an account with us, please login at the <a href="login.php" >login page</a>. </p>
        <div class="alert alert-info">
            <h4>IMPORTANT NOTICE</h4>
            <p>In an effort to provide prompt customer service please notify the individual responsible for your EMAIL SERVER 
                that you need to have YouthBowlingAwards.com enabled as a safe sender. Our ability to contact 
                you through email and your prompt replies are essential to avoid delays to your order. We will be 
                sending emails with images for artwork approvals that can, and often are blocked by firewall and 
                email server settings if not specifically set up to allow emails and images from YouthBowlingAwards.com. 
            </p>
            <p>If you at all believe that this may be an issue, please assign a personal email for YouthBowlingAwards correspondence.</p>
        </div>
        <?php $flash->render(); ?>
        <form id="myform" name="myForm" method="post" >
            <div class="row">
                <fieldset>                
                    <div class="col-md-6">
                        <legend>Address Details</legend>
                        <?= $form->input('address.entry_company', ['label' => 'Company']); ?>
                        <?= $form->input('address.entry_gender', ['required', 'type' => 'radio', 'options' => ['m' => 'Male', 'f' => 'Female']]); ?>
                        <div class='row'>
                            <div class="col-sm-6">
                                <?= $form->input('address.entry_firstname', ['label' => 'First Name', 'required']); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->input('address.entry_lastname', ['label' => 'Last Name', 'required']); ?>
                            </div>
                        </div>
                        <?= $form->input('address.entry_street_address', ['label' => 'Street Address', 'required']); ?>
                        <?= $form->input('address.entry_suburb', ['label' => 'Address Line 2']); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->input('address.entry_city', ['label' => 'City', 'required']); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->input('address.entry_state', ['label' => 'State', 'required']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?=
                                $form->input('address.entry_country_id', [
                                    'label' => 'Country',
                                    'options' => $countries,
                                    'required']);
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->input('address.entry_postcode', ['label' => 'Post/Zipcode', 'required']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?=
                        $form->input('info.sources_id', [
                            'label' => 'How did you hear about us?',
                            'options' => $sources,
                            'required']);
                        ?>
                        
                        <legend>Additional Contact Details</legend>
                        <?= $form->input('customer.customers_telephone', ['label' => 'Telephone', 'required']); ?>
                        <legend>Login Details</legend>   
                        <?= $form->input('customer.customers_email_address', ['label' => 'Email Address', 'required', 'type' => 'email']); ?>
                        <?= $form->input('form.password', ['required', 'type' => 'password']); ?>
                        <?= $form->input('form.confirm_password', ['required', 'type' => 'password']); ?>
                    </div> <!-- colmd6 -->     
                </fieldset>
            </div> <!-- row -->  
            <div class='text-right'>
                <button type="submit" class="btn btn-lg btn-success" name="submit">Submit</button>
            </div>
        </form> 
        <?php include 'includes/footer.php'; ?>      
    </div> <!-- container -->
</body>
</html>
