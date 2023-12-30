<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {


$nocomplain=$_POST['nocomplain'];
$trackingnum=$_POST['trackingnum'];
$issuedes=$_POST['issuedes'];
$ticnum=mt_rand(100000, 999999);

$sql=mysqli_query($con,"select ID from tblcourier where RefNumber='$trackingnum'");
$row=mysqli_num_rows($sql);
if($row>0){
$query=mysqli_query($con,"insert into tblcomplains(TicketNumber,TrackingNumber,NatureofComplain,IssuesDesc) value('$ticnum','$trackingnum','$nocomplain','$issuedes')");
if ($query) {
echo '<script>alert("Your ticket has been generated. Ticket Number is "+"'.$ticnum.'")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  } else {

     echo '<script>alert("Invalid Refrence or tracking Number")</script>';
     echo "<script>window.location.href ='raise-complaint.php'</script>";
  }

  

}

?>
<!doctype html>
<html lang="en">

  <head>
    <title>Courier Management System|| Raise Complain</title>
   
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

      <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <div class="block-heading-1">
            
              <h2>Raise Tickets</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
            <form action="" method="post">
              <div class="form-group row">
                <div class="col-md-12 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Enter Parcel Number" name="trackingnum" pattern="[0-9]+" title="only numbers" required >
                </div>
                
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" name="nocomplain" class="form-control" placeholder="Nature of Complaint" required="true">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="issuedes" id="" class="form-control" placeholder="Describe Your Issue." cols="30" rows="10" required="true"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" name="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Submit">
                </div>
              </div>
            </form>
          </div>
         <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white p-3 p-md-5">

              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link"><?php
$query=mysqli_query($con,"select * from tblpage where PageType='contactus'");
while ($row=mysqli_fetch_array($query)) {

?>
                <li class="d-block mb-3">
                  <span class="d-block text-black">Address:</span>
                  <span><?php echo $row['PageDescription'];?></span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+<?php  echo htmlentities ($row['MobileNumber']);?></span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span><?php  echo htmlentities($row['Email']);?></span></li>
              <?php } ?></ul>
            </div>
          </div>
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
