<?php
session_start();
include 'includes/db.php';
include 'includes/flash.php';
$db = new db();
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
<body id="editaccount">   
    <div class="container"> <!-- container -->
        <?php
        include 'includes/header.php';

        $id = $_GET['edit'];
        if (isset($_POST['submitted'])) {
            if ($id):
                //UPDATE
                $db->update('zen_address_book', $_POST['data'], "address_book_id = $id AND customers_id = {$user['customers_id']}");
                $flash->success('Address Updated');
            else:
                $_POST['data']["customers_id"] = $user['customers_id'];
                $db->create('zen_address_book', $_POST['data']);
                $flash->success('Address Created');
            endif;
            if ($_POST["primary"] == "1"):
                $db->update('zen_customers', ['customers_default_address_id' => $id], "customers_id = {$user['customers_id']}");
                $_SESSION['user']['customers_default_address_id'] = $id;
            endif;
        }

        $countries = $db->find('all', 'zen_countries', '', [], 'countries_name, countries_id');
        $optcountries = '';
        foreach ($countries as $country) {
            $optcountries .= "<option value={$country['countries_id']}>{$country['countries_name']}</option>";
        }
        //default values if new
        $ab = $db->find('first', "zen_address_book a
                LEFT JOIN zen_countries b
                ON a.entry_country_id = b.countries_id", "a.address_book_id = {$id}
                ORDER BY a.address_book_id = {$user['customers_default_address_id']} DESC")
        ?> 
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="my_account.php">My Acount</a></li>
                    <li><a href="address_book.php">Address Book</a></li>
                    <li class="active"><?= $id ? 'ID #' . $ab['address_book_id'] : 'New Record'; ?></li>
                </ol>
            </div>
        </div>
        <h1><?= $id ? 'Update' : 'New'; ?> Address Book</h1>
        <?php $flash->render(); ?>
        <form method="post">
            <fieldset>
                <legend>Adress Details</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input text"><label for="AddressBookEntryCompany">Company Name</label>
                            <input name="data[entry_company]" placeholder="Company Name" 
                                   class="form-control" maxlength="64" type="text" value="<?= $ab['entry_company']; ?>" 
                                   id="AddressBookEntryCompany"></div>                                       
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div class="form-group">
                            <input type="radio" name="data[entry_gender]" id="AddressBookEntryGenderM" value="m" 
                                   <?= $ab['entry_gender'] == 'm' ? 'checked' : ''; ?> required="required">
                            <label for="AddressBookEntryGenderM">&nbsp;Mr.&nbsp;</label>
                            <input type="radio" name="data[entry_gender]" id="AddressBookEntryGenderF" value="f" 
                                   <?= $ab['entry_gender'] == 'f' ? 'checked' : ''; ?>required="required">
                            <label for="AddressBookEntryGenderF">&nbsp;Ms.</label>                                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input text required"><label for="AddressBookEntryFirstname">First Name</label>
                                <input name="data[entry_firstname]" class="form-control" placeholder="First Name" 
                                       required="required" maxlength="32" type="text" value="<?= $ab['entry_firstname']; ?>" id="AddressBookEntryFirstname"></div>                                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input text required"><label for="AddressBookEntryLastname">Lastname</label>
                                <input name="data[entry_lastname]" class="form-control" placeholder="Last Name" required="required" 
                                       maxlength="32" type="text" value="<?= $ab['entry_lastname']; ?>" id="AddressBookEntryLastname"></div>                                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input select"><label for="AddressBookEntryCountryId">Country</label><select name="data[entry_country_id]" class="form-control" required="required" id="AddressBookEntryCountryId">
                                    <option value="">Select Your Country</option>
                                    <?= $ab['entry_country_id'] ? str_replace("value={$ab['entry_country_id']}", "value={$ab['entry_country_id']} selected", $optcountries) : $optcountries; ?>
                                </select></div>                                           
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="from-group">
                            <div class="input text required"><label for="AddressBookEntryStreetAddress">Street Address</label>
                                <input name="data[entry_street_address]" class="form-control" placeholder="Street Address" required="required"
                                       maxlength="64" type="text" value="<?= $ab['entry_street_address']; ?>" id="AddressBookEntryStreetAddress"></div>                                            </div>
                        <div class="from-group">
                            <div class="input text"><label for="AddressBookEntrySuburb">Address Line 2</label>
                                <input name="data[entry_suburb]" class="form-control" placeholder="Address Line 2" 
                                       maxlength="32" type="text" value="<?= $ab['entry_suburb']; ?>" id="AddressBookEntrySuburb"></div>                                            </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input text required"><label for="AddressBookEntryCity">City</label>
                                <input name="data[entry_city]" class="form-control" placeholder="City" 
                                       required="required" maxlength="32" type="text" value="<?= $ab['entry_city']; ?>" id="AddressBookEntryCity"></div>                                            </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input text required"><label for="AddressBookEntryState">State/Province</label>
                                <input name="data[entry_state]" class="form-control" placeholder="State/Province" 
                                       required="required" maxlength="32" type="text" value="<?= $ab['entry_state']; ?>" id="AddressBookEntryState"></div>                                            </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input text"><label for="AddressBookEntryPostcode">Post/Zip Code</label>
                                <input name="data[entry_postcode]" class="form-control" placeholder="Post/ZIP Code" 
                                       required="required" maxlength="10" type="text" value="<?= $ab['entry_postcode']; ?>" id="AddressBookEntryPostcode"></div>                                            </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">                        
                            <input type="checkbox" name="primary" 
                            <?= $user['customers_default_address_id'] == $ab['address_book_id'] ? 'checked' : ''; ?> 
                                   value="1" id="MiscPrimary">           
                            <label for="MiscPrimary">Set as primary.</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 bottom-20">
                        <button type="submit" name="submitted" class="btn btn-block btn-success">
                            <?= $id ? 'Update' : 'Create New'; ?>                                            
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
        <footer>
            <?php include 'includes/footer.php'; ?>      
        </footer>
    </div>
</body>
</html>


