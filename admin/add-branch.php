<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['cmsaid'];
 $branchname=$_POST['branchname'];

$contnum=$_POST['contactnumber'];
$bemail=$_POST['email'];
$baddress=$_POST['address'];
$bcity=$_POST['city'];
$bstate=$_POST['state'];
$bpincode=$_POST['pincode'];
$bcountry=$_POST['country'];
 $query=mysqli_query($con,"insert into tblbranch(BranchName,BranchContactnumber,BranchEmail,BranchAddress,BranchCity,BranchState,BranchPincode,BranchCountry) value('$branchname','$contnum','$bemail','$baddress','$bcity','$bstate','$bpincode','$bcountry')");

    if ($query) {
   
    echo '<script>alert("Branch Detail has been added.")</script>';
echo "<script>window.location.href ='add-branch.php'</script>";
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

        <!-- App title -->
        <title>CMS Branches</title>

        <!-- Switchery css -->
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Branch Detail</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <!-- end row -->

                        <div class="row">

                            <div class="col-md-12">
                                <div class="card-box">
   
                                   <h4 class="header-title m-t-0 m-b-30">Branch Detail</h4>
<form name="addbranch" method="post"> 
                                    <div class="form-group row">
                                       
                                        <label for="example-text-input" class="col-2 col-form-label">Branch Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value=""  name="branchname" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Branch Contact Number</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="contactnumber" maxlength="10" required="true" pattern="[0-9]+">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Branch Email</label>
                                        <div class="col-10">
                                            <input class="form-control" type="email" value="" id="" name="email" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-2 col-form-label">Branch Address</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="address" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-2 col-form-label">Branch City</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="city" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-password-input" class="col-2 col-form-label">Branch State</label>
                                        <div class="col-10">
  <input class="form-control" type="text" value="" id="" name="state" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-2 col-form-label">Branch Pincode</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="pincode" required="true" maxlength="6" pattern="[0-9]+">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="example-number-input" class="col-2 col-form-label">Branch Country</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="country" required="true">
                                        </div>
                                    </div>
                                    
                                                                
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-10">
                                          <p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
                                           
                                        </div>
                                        
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>


                       
                        <!-- end row -->


                    <!-- container -->




            </div>
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



            <?php include_once('includes/footer.php');?>


        </div>
    </div></div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>