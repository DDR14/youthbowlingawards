<?php
session_start();

include "include/db.php";
$db = new db('boostpr1_boostpromotions');

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (isset($_POST['submitted'])) {
    if (!$_POST['DesignsDesc']['design_id']) {
        $_POST['DesignsDesc']['design_id'] = uniqid();
    }
    if ($_POST['submitted'] == 'Update') {
        $_POST['Designs']['modified'] = date('Y-m-d H:i:s');

        $db->update('zen_discounted_designs', $_POST['Designs'], 'design_id = :id', ['id' => $id]);
    }
    header('Location: discounted_designs.php');
}
if (isset($_POST['delete_'])) {
    $db->delete('zen_discounted_designs', 'design_id = :id', ['id' => $id]);

    header('Location: discounted_designs.php');
}
if(isset($_POST['cancel'])){
    header('Location: discounted_designs.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>ToDo:]- Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
        <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
        <!--Jquery UI CSS-->        
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="css/vieworder.css" rel="stylesheet" type="text/css" />       
        <!-- BEGIN: load jquery -->
        <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui/timepicker.min.js"></script>
        <!-- END: load jquery -->
        <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/setup.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                setSidebarHeight();
            });
        </script>  
        <script type="text/javascript">
            $(document).ready(function () {
                setDatePickerOrder('pick_date');
                setSidebarHeight();

                var startDateTextBox = $('#range_example_2_start');
                var endDateTextBox = $('#range_example_2_end');

                $.timepicker.datetimeRange(
                        startDateTextBox,
                        endDateTextBox,
                        {
                            minInterval: (1000 * 60), // 1hr
                            dateFormat: 'yy-mm-dd',
                            timeFormat: 'HH:mm:ss'
                        }
                );
            });
        </script>
    </head>
    <body>

        <?php
        require_once('inc.functions.php');
//        secure();
        ?>
        <div class="container_12">
            <?php
            require_once('inc.header.php');
            ?>  
            <div class="grid_2">
                <?php
                if (isset($_GET['display'])) {
                    $display = $_GET['display'];
                } else {
                    $display = 0;
                }
                ?>
                <div class="box sidemenu">
                    <div class="block" id="section-menu">
                        <ul class="section menu">
                            <li><a class="menuitem">DISCOUNTED DESIGNS</a>
                                <ul class="submenu current">
                                    <?php $dd = $db->find('first', 'zen_discounted_designs', '', [], 'COUNT(1) AS ddcount, (SELECT COUNT(1) FROM zen_designs) AS designcount'); ?>
                                    <li><a href="discounted_designs.php"> Discounted Designs (<?= $dd['ddcount']; ?>)</a></li>
                                </ul>
                            </li>                            
                        </ul>
                        <ul class="section menu">
                            <li><a class="menuitem">CHOOSE FROM CATEGORIES</a></li>
                        </ul>
                        <div id="accordion">
                            <ul class="tree">
                                <li><a href='discounted_designs.php?display=all'><span class='inlineblock ui-icon ui-icon-document'></span>
                                        ALL <small>(<?= $dd['designcount'] ?>)</small></a></li>
                                <?php
//MAKE TREEVIEW OF CATEGORIES                     
                                $categories = $db->find('all', "zen_categories_description a INNER JOIN zen_categories b "
                                        . "ON a.categories_id = b.categories_id", "b.parent_id='48' "
                                        . "ORDER BY b.sort_order, a.categories_name", [], "b.parent_id, a.categories_name, a.categories_id, "
                                        . "(SELECT COUNT(products_id) FROM zen_designs WHERE master_categories_id = a.categories_id) AS total ");

//OPTION BOX FOR CHOOSING CATEGORY also THE SIDEBAR
                                $bread_title = '';
                                foreach ($categories as $row) { 
                                    $submenu = '';
                                    $subopt_category = '';
                                    $parent_id = $row['parent_id'];

                                    $categories_name = $row['categories_name'];
                                    $categories_id = $row['categories_id'];
                                    $total = $row['total'];

                                    $active = '';
                                    if ($display == $categories_id) {
                                        $bread_title = $categories_name;
                                        $active = "class='active'";
                                    }
                                    echo "<li><a $active href='discounted_designs.php?display=$categories_id'><span class='inlineblock ui-icon ui-icon-document'></span>"
                                    . "$categories_name <small>($total)</small></a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid_10">
                <?php
                $Designs = $db->find('first', 'zen_designs a INNER JOIN zen_discounted_designs b ON a.products_id = b.design_id', 'a.products_id = :id', ['id' => $id], 'a.*,b.* ,a.design_name');
                // for add new
                $update = true;
                
                ?>
                <h2>EDIT DISCOUNTED DESIGN INFORMATION</h2>
                <div class=" box first">
                    <h2><?= 'DESIGN # ' . $Designs['products_id']; ?></h2>
                    <form action='' method='POST'> 
                        <div class="grid_3" ><br>
                            <p><b>Design Name:</b><br />
                                <input required type='text' value="<?= $Designs['design_name']; ?>" 
                                       name='DesignsDesc[design_name]' disabled/> 
                            </p>   
                            <p><b>Model Number:</b><br />
                                <input required type='text' value="<?= $Designs['products_model']; ?>" 
                                       name='DesignsDesc[products_model]' disabled/>  
                            </p>
                            <p><b>Price Discount:</b><br/>
                                <input type='text' value="<?= $Designs['dd_new_products_price']; ?>" 
                                       name='Designs[dd_new_products_price]'/> 
                            </p>       
                        </div>
                        <div class="grid_4" >
                            <br>
                            <p><b>Special Date Available:</b><br /><input type='text' id="range_example_2_start" value="<?= $Designs['specials_date_available']; ?>" name='Designs[specials_date_available]'/> </p>
                            <p><b>Expiration Date:</b><br /><input type='text' id="range_example_2_end" value="<?= $Designs['expires_date']; ?>" name='Designs[expires_date]'/> </p>
                            <p><b>Number of Customers Avail:</b><br />
                                <input type='text' value="<?= $Designs['dd_uses']; ?>" 
                                       name='Designs[dd_uses]'/> </p>
                            <?php if ($update): ?>
                                <p><input type='submit' class="btn btn-blue" name='submitted' value='Update' />                                                                   
                                    <input type="submit" formnovalidate="" value="Delete" onclick="return confirm('Are you sure?')" name="delete_" class="btn btn-red"/>

                                    <input type='submit' class="btn btn-green" name='cancel' value='Cancel' /> 
                                </p>    
                            <?php endif; ?>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div> 
        <div id="site_info">
            <p>
                Copyright <a href="#">ToDo:]</a>. All Rights Reserved.
            </p>
        </div>
    </body>
</html>

<script type="text/javascript">
    <!-- script -->
        <script type="text/javascript">
            function getImgDir(data) {
                if (typeof data != "undefined") {
                    var type = data.split("-");
                    var dir;
                    switch (type[0]) {
                        case "AC":
                            dir = "Academic";
                            break;
                        case "AW":
                            dir = "Awards";
                            break;
                        case "AR":
                            dir = "Art";
                            break;
                        case "AT":
                            dir = "Attendance";
                            break;
                        case "BE":
                            dir = "Behavior";
                            break;
                        case "HB":
                            dir = "Birthday";
                            break;
                        case "BT":
                            dir = "Box Top";
                            break;
                        case "BU":
                            dir = "Business";
                            break;
                        case "CP":
                            dir = "Camping";
                            break;
                        case "CI":
                            dir = "Citizenship";
                            break;
                        case "CL":
                            dir = "Club";
                            break;
                        case "CO":
                            dir = "Collectibles";
                            break;
                        case "HT":
                            dir = "Health";
                            break;
                        case "MA":
                            dir = "Mascots";
                            break;
                        case "MT":
                            dir = "Math";
                            break;
                        case "OR":
                            dir = "Organization";
                            break;
                        case "PE":
                            dir = "Personal";
                            break;
                        case "PA":
                            dir = "Parents";
                            break;
                        case "RE":
                            dir = "Reading";
                            break;
                        case "SC":
                            dir = "Science";
                            break;
                        case "SD":
                            dir = "Special Days";
                            break;
                        case "ST":
                            dir = "States";
                            break;
                        case "SP":
                            dir = "Sports";
                            break;
                        case "MI":
                            dir = "Medical";
                            break;
                        case "HO":
                            dir = "Holiday";
                            break;
                        case "PRE":
                            dir = "Kinder";
                            break;
                        case "CCA":
                            dir = "CCA";
                            break;
                    }

                    return dir;
                }
            }
</script>

