<?php
include 'includes/session.php';
include 'includes/dbconnect.php';
?>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouthBowlingAwards</title>
        <link rel="stylesheet" type="text/css" href="_/css/bootstrap.css" media="screen">
        <link rel="stylesheet" type="text/css" href="_/css/mystyles.css" media="screen">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
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
<style type="text/css">
 

</style>
    
</head>
<body id="viewhistory">
  <div class="container-fluid"> <!-- container -->
        <div class="wrapper">
            <div class="col-sm-10 col-sm-offset-1">
                <header> <!-- header -->
                    <?php include 'includes/header.php'; ?>      
                </header> <!-- end of header -->       
            </div>
        </div> <!-- wrapper -->
        <?php
          $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
              die("error connection" . mysqli_connect_error());
            }else{
                  $sql = "SELECT * FROM zen_orders 
                        WHERE customers_id = '$customers_id'";
                  $result = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_assoc($result);
                  if (is_array($row)) {
                  $orders_id = $row['orders_id'];
                  $customer_name = $row['customers_name'];
                  $date_purchased =date($row['date_purchased']);
                  $order_total = $row['order_total'];
                  }  
            }

         ?>
        
        <div class="container-fluid"><!-- bread crumb -->
            <div class="col-sm-10">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="previous_order.php">Previous Orders</a></li>
                    <li class="active"><?php echo "#" . $orders_id; ?></li>
                </ol>
            </div>
        </div> <!-- end of breadcrumb -->
        <div class="container">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
              <div class="col-sm-6">
                <p>Your tracking number will be dispayed here when your order is shipped.</p>
                <h4>YOU HAVE PROOFS FOR THIS ORDER</h4>
                <p>Please type the reasons you denied the proof in the textbox when you deny a proof</p>
                <p>Click the picture to view on larger scale.</p>
              </div>
              <div class="col-sm-6">
                <?php 
                
                 ?>
              </div>
            </div>

          </div>









        </div>







        <!-- end of content -->
              <div class="wrapper">
                  <div class="col-sm-10 col-sm-offset-1">
                      <header> <!-- header -->
                          <?php include 'includes/footer.php'; ?>      
                      </header> <!-- end of header -->       
                  </div>
              </div> <!-- wrapper -->
  </div> <!-- end of container -->

</body>
</html>

