<?php 
include 'session.php';


if (isset($_POST['update'])) {
$company_name = stripslashes($_POST['company_name']);
$gender = stripslashes($_POST['sex']);
$f_name = stripslashes($_POST['f_name']);
$l_name = stripslashes($_POST['l_name']);
$st_address = stripslashes($_POST['st_address']);
$state_province = stripslashes($_POST['state_province']);
$city = stripslashes($_POST['city']);
$post_zip = stripslashes($_POST['post_zip']);
$country = stripslashes($_POST['country']);
$customers_id = $_SESSION['customers_id'];

}else{
				echo "<script>
				alert('invalid Entry!!')
				window.location = '../updatebilling.php'
				</script>";
}
include 'dbconnect.php' ;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("error in connection" . mysqli_connect_error());
}else{

$sql = "UPDATE zen_customers
		SET customers_gender = '$gender', customers_firstname = '$f_name', customers_lastname = '$l_name'
		WHERE customers_id = '$customers_id'";


$sql = "UPDATE zen_address_book
		SET entry_company = '$company_name', entry_gender = '$gender', entry_firstname = '$f_name', entry_lastname = '$l_name', entry_street_address = '$st_address', entry_postcode = '$post_zip', entry_city = '$city', entry_country_id = '$country'
		WHERE customers_id = '$customers_id'";

if (mysqli_query($conn, $sql)) {
				echo "<script>
				alert('Profile Successfully Updated!!')
				window.location = '../checkout.php'
				</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}

mysqli_close($conn);


?>
