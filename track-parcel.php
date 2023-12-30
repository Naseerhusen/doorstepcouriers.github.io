<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">

  <head>
    <title>Courier Management System|| Parcel Tracking</title>
   
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


<?php include_once('includes/header.php');?>

  




      <div class="site-section bg-light" id="pricing-section">
        <div class="container">
         
<div class="row text-left">
<?php
if(isset($_POST['search'])){
$searchdata=$_POST['searchdata'];
$ret=mysqli_query($con,"select tblcourier.id as cid, tblcourier.RefNumber,tblcourier.SenderName,tblcourier.SenderCity,tblcourier.SenderState,tblcourier.SenderPincode,tblcourier.SenderCountry,tblcourier.RecipientName,tblcourier.RecipientCity,tblcourier.RecipientState,tblcourier.RecipientPincode,tblcourier.RecipientCountry from  tblcourier where tblcourier.RefNumber='$searchdata'");
$num=mysqli_num_rows($ret);
if($num >0){
while ($row=mysqli_fetch_array($ret)) {

?><div class="col-lg-12">
<h4 align="center" style="color:red">Tracking / Reference Id <?php echo $searchdata;?> Details</h4>
<hr>
</div>
      <div class="col-lg-6 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Sender</h4>
            <hr />
<table border="1" width="100%" style="text-align: center;">
 
<tr>
<th> Name</th>
<td><?php  echo $row['SenderName'];?></td>
</tr> 
<tr>
<th> City</th>
<td><?php  echo $row['SenderCity'];?></td>
</tr> 
<tr>
<th> State</th>
<td><?php  echo $row['SenderState'];?></td>
</tr> 
<tr>
<th>Pincode</th>
<td><?php  echo $row['SenderPincode'];?></td>
</tr> 
<tr>
<th>Country</th>
<td><?php  echo $row['SenderCountry'];?></td>
</tr> 
</table>

          </div>
        </div>
      </div>

       <div class="col-lg-6 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Recipient</h4>
            <hr />
  <table border="1" width="100%" style="text-align: center;">
<tr>
<th> Name</th>
<td><?php  echo $row['RecipientName'];?></td>
</tr> 
<tr>
<th> City</th>
<td><?php  echo $row['RecipientCity'];?></td>
</tr> 
<tr>
<th> State</th>
<td><?php  echo $row['RecipientState'];?></td>
</tr> 
<tr>
<th>Pincode</th>
<td><?php  echo $row['RecipientPincode'];?></td>
</tr> 
<tr>
<th>Country</th>
<td><?php  echo $row['RecipientCountry'];?></td>
</tr> 
</table>
          </div>
        </div>
      </div>
      <?php

  $cid=$row['cid'];   
$ret=mysqli_query($con,"select remark,status,StatusDate from tblcouriertracking where  CourierId='$cid'");
$num=mysqli_num_rows($ret);
if($num>0){
?>
     <div class="col-lg-12 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Tracking History</h4>
            <hr />
<table border="1" width="100%" style="text-align: center;">
  <tr>
    <th>Date / Time</th>
    <th>Status </th>
    <th>remark</th>
  </tr>
 <?php while ($row=mysqli_fetch_array($ret)) { ?>
<tr>
<td><?php  echo $row['StatusDate'];?></td>
<td><?php  echo $row['status'];?></td>
<td><?php  echo $row['remark'];?></td>
</tr>  
<tr>
<?php }?>
</table>

          </div>
        </div>
      </div>

<?php
} else{ ?>
<h4 style="color:red" align="center">Not Shipped yet </h4>
   <?php } }} else {  ?>

<h4 align="center" style="color:red">Invalid Tracking / Reference Number </h4>
<?php }}?>
    <!-- /.row -->

  </div>


        </div>
      </div>


    </div>





    <?php include_once('includes/footer.php');?>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>


  </body>

</html>
