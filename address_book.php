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
        <?php include 'includes/header.php'; ?> 
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="my_account.php">My Acount</a></li>
                    <li class="active">Address Book</li>
                </ol>
            </div>
        </div>
        <h1>My Personal Address Book</h1>
        <?php
        if (isset($_POST['_delete'])) {
            $db->delete('zen_address_book', 'address_book_id = :abd AND customers_id = :cd', [
                'abd' => $_POST['_delete'], 'cd' => $user['customers_id']]);
            $flash->success('Address Deleted');
        }

        $addressBooks = $db->find('all', "zen_address_book a
                LEFT JOIN zen_countries b
                ON a.entry_country_id = b.countries_id", "a.customers_id = {$user['customers_id']}
                ORDER BY a.address_book_id = {$user['customers_default_address_id']} DESC")
        ?>
        <fieldset>
            <legend>Address Book Entries</legend>
            
            <a href="address_book_process.php?edit=0" class="btn btn-success btn-sm">
                <i class="glyphicon glyphicon-plus"></i> &nbsp;Add Address</a>
            <div class="row">
                <div class="col-md-12">
                    <?php $flash->render(); ?>
                    <div class="text-info text-right">
                        <p>Note: A maximum of 5 address book entries allowed</p>
                    </div>
                </div>
            </div>
            <?php foreach ($addressBooks as $address): ?>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li>
                                <?= ucfirst($address["entry_company"]); ?>
                            </li>
                            <li>
                                <?= ucfirst($address["entry_firstname"]); ?>&nbsp;<?= ucfirst($address["entry_lastname"]); ?>
                            </li>
                            <li>
                                <?= ucfirst($address["entry_street_address"]); ?>
                            </li>
                            <li>
                                <?= ucfirst($address["entry_suburb"]); ?>
                            </li>
                            <li>
                                <?= ucfirst($address["entry_city"]); ?>, <?= ucfirst($address["entry_state"]); ?>
                                <?= ucfirst($address["entry_postcode"]); ?>
                            </li>
                            <li>
                                <?= ucfirst($address["countries_name"]); ?>
                            </li>
                        </ul>                        
                        <form method="post">
                            <a href="address_book_process.php?edit=<?= $address['address_book_id']; ?>" class="btn btn-primary btn-sm">
                                <i class="glyphicon glyphicon-edit"></i> &nbsp;Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this address book?')">
                                <i class="glyphicon glyphicon-remove"></i> &nbsp;Delete</button>
                            <input type="hidden" name="_delete" value="<?= $address['address_book_id']; ?>" />
                        </form>                        
                    </div>

                    <div class="col-md-6">                                               
                        <?php if ($address['address_book_id'] == $user['customers_default_address_id']): ?>
                            <div class="arrow_box">
                                <p class="alert alert-warning">
                                    <b>Note:</b><br />
                                    This address is used as the pre-selected shipping and billing address for orders placed on this store. <br />This address is also used as the base for product and service tax calculations.
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <hr/>
            <?php endforeach; ?>

            <?php if (empty($addressBooks)): ?>
                <p>No Address Books Entries.</p>
            <?php endif; ?>
        </fieldset>
        <footer>
            <?php include 'includes/footer.php'; ?>      
        </footer>
    </div>
</body>
</html>


