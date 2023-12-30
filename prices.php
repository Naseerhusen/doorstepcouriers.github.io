<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
    if(isset($_POST['submit']))
  {

$name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];
 $query=mysqli_query($con,"insert into tblcontact(Name,MobileNumber,Email,Message) value('$name','$phone','$email','$message')");

    if ($query) {
    echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!doctype html>
<html lang="en">

  <head>
    <title>Door Couriers || Prices Page</title>
   
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
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Define some custom CSS for specific cells if needed */
        td.weight {
            font-weight: bold;
        }

        /* Add additional styling as needed */

    </style>

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



    <!-- <h2>Parcel Prices</h2> -->
    <table>
        <thead>
          <tr>
            <th colspan=2><h5>Parcel Prices</h5></th>
          </tr>
      </thead>
      <thead>
            <tr>
                <th>Weight (kg)</th>
                <th>Price (₹) </th>
            </tr>
      
        </thead>
        <tbody>
            <tr>
                <td class="weight">Less than 1</td>
                <td>100</td>
            </tr>
            <tr>
                <td class="weight">1-3</td>
                <td>200</td>
            </tr>
            <tr>
                <td class="weight">3-5</td>
                <td>250</td>
            </tr>
            <tr>
                <td class="weight">5-10</td>
                <td>400</td>
            </tr>
            <tr>
                <td class="weight">10+</td>
                <td>500</td>
            </tr>
        </tbody>
    </table>

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
