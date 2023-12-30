<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">

  <head>
    <title>Courier Management System|| Complain Tracking</title>
   
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
$ret=mysqli_query($con,"select tblcomplains.TicketNumber,tblcomplains.TrackingNumber,tblcomplains.NatureofComplain,tblcomplains.IssuesDesc,tblcomplains.CompDate,tblcomplains.Status,tblcomplains.Remark from  tblcomplains where (tblcomplains.TrackingNumber='$searchdata' || tblcomplains.TicketNumber='$searchdata' )");
$num=mysqli_num_rows($ret);
if($num >0){
while ($row=mysqli_fetch_array($ret)) {

?><div class="col-lg-12">
<h4 align="center" style="color:red">Ticket Number/ Tracking Number <?php echo $searchdata;?> Details</h4>
<hr>
</div>
      

       
  
<div class="col-lg-12 col-md-12 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Status of Complain</h4>
            <hr />
<table border="1" width="100%" style="text-align: center;">
<tr>
<th> Ticket Number</th>
<td><?php  echo $row['TicketNumber'];?></td>
</tr> 
<tr>
<th> Nature of Issue</th>
<td><?php  echo $row['NatureofComplain'];?></td>
</tr> 
<tr>
<th> Detail of Issue</th>
<td><?php  echo $row['IssuesDesc'];?></td>
</tr> 
<tr>
<th>Complain Date</th>
<td><?php  echo $row['CompDate'];?></td>
</tr> 
<tr>
<th>Status</th>
<?php if($row['Status']==""){ ?>

                     <td><?php echo "Still Pending"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row['Status']);?>
                  </td>
                  <?php } ?>
</tr> 
<tr>
<th>Remark</th>
<?php if($row['Remark']==""){ ?>

                     <td><?php echo "Still Pending"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row['Remark']);?>
                  </td>
                  <?php } ?>
</tr> 
</table>



          </div>
        </div>
      </div>
<?php
} ?>

   <?php  }} else {  ?>

<h4 align="center" style="color:red">Invalid Ticket Number </h4>
<?php }?>

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
