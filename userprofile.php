<?php
include 'includes/session.php';
include 'includes/dbconnect.php';
?>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YOUTH BOWLING AWARDS</title>
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
<body id="userprofile">
  <div class="container-fluid"> <!-- container -->
        <div class="wrapper">
            <div class="col-sm-10 col-sm-offset-1">
                <header> <!-- header -->
                    <?php include 'includes/header.php'; ?>      
                </header> <!-- end of header -->       
            </div>
        </div> <!-- wrapper -->
        <div class="container"> <!-- content -->
          <div class="col-sm-10">
            <?php 
            $conn = mysqli_connect($servername, $username, $password, $dbname);
              if (!$conn) {
                die("error connection" . mysqli_connect_error());
              }else{
                $sql = "SELECT * FROM zen_customers
                        WHERE customers_id = $customers_id";
                $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                          echo "Customers ID: ". $row['customers_id'];
                          echo  $row['customers_firstname'] . $row['customers_lastname'];
                          echo  $row['customer_email'];
                    }
                        }
             ?>
          </div>

          </div> <!-- content -->
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


