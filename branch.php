<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">

  <head>
    <title>Courier Management System|| Branch Page</title>
   
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

 



      <div class="site-section" id="team-section">
        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                <h2>Our Branch</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div>
 
          <div class="owl-carousel owl-all">
           <?php
$query=mysqli_query($con,"select * from tblbranch");
while ($row=mysqli_fetch_array($query)) {

?>
            <div class="block-team-member-1 text-center rounded h-100">


              <figure>
                <img src="images/office.png" style="border: solid 1px #000" alt="Image" class="img-fluid rounded-circle">
              </figure>
              <h3 class="font-size-20 text-black"><?php echo $row['BranchName'];?></h3>
              <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Branch Name</span>
              <p><strong>Contact Number: </strong><?php echo $row['BranchContactnumber'];?></p>
              <p><strong>Email ID: </strong><?php echo $row['BranchEmail'];?></p>
              <p><strong>Address: </strong><?php echo $row['BranchAddress'];?></p>
              <p><strong>City: </strong><?php echo $row['BranchCity'];?></p>
               <p><strong>State: </strong><?php echo $row['BranchState']."-".$row['BranchPincode'];?></p>
                <p><strong>Country: </strong><?php echo $row['BranchCountry'];?></p>
            
            </div><?php } ?>
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
