<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$cmsaid=$_SESSION['cmsaid'];
 $branchname=$_POST['branchname'];

$staffname=$_POST['staffname'];
$smobnumber=$_POST['mobilenumber'];
$semail=$_POST['email'];


 $query=mysqli_query($con,"update tblstaff set BranchName='$branchname',StaffName='$staffname',StaffMobilenumber='$smobnumber',StaffEmail='$semail' where  ID='$eid'");

    if ($query) {
    $msg="Staff Detail has been updated.";
    echo '<script>alert("Staff Detail has been updated.")</script>';
    echo "<script>window.location.href ='manage-staff.php'</script>";
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
        <title>CMS</title>

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
                                    <h4 class="page-title float-left">Staff Detail</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <!-- end row -->

                        <div class="row">

                            <div class="col-md-12">
                                <div class="card-box">
   
                                   <h4 class="header-title m-t-0 m-b-30">Staff Detail</h4>
<form name="addbranch" method="post"> 
                                    <div class="form-group row">
                                       <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblstaff where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <label for="example-text-input" class="col-2 col-form-label">Branch Name</label>
                                        <div class="col-10">
                                            <select name='branchname' id="branchname" class="form-control white_bg">
    <option value="<?php echo $row['BranchName'];?>"><?php echo $row['BranchName'];?></option>
      <?php $query=mysqli_query($con,"select * from  tblbranch");
              while($rw=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $rw['BranchName'];?>"><?php echo $rw['BranchName'];?></option>
                  <?php } ?>  
   </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Staff Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="<?php echo $row['StaffName'];?>" id="" name="staffname" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Staff Mobile Number</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="<?php echo $row['StaffMobilenumber'];?>" id="" name="mobilenumber" maxlength="10" required="true" pattern="[0-9]+">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Staff Email</label>
                                        <div class="col-10">
                                            <input class="form-control" type="email" value="<?php echo $row['StaffEmail'];?>" id="" name="email" required="true">
                                        </div>
                                    </div>
                                  
                                    
                                   
                                        <?php } ?>                        
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-10">
                                          <p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-primary">Update</button></p>
                                           
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