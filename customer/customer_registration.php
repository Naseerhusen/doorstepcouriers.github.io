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

$staffname=$_POST['staffname'];
$smobnumber=$_POST['mobilenumber'];
$semail=$_POST['email'];
$spassword=md5($_POST['password']);
$status=1;
 $query=mysqli_query($con,"insert into tblstaff(BranchName,StaffName,StaffMobilenumber,StaffEmail,StaffPassword,status) value('$branchname','$staffname','$smobnumber','$semail','$spassword','$status')");

    if ($query) {
 
    echo '<script>alert("Staff Detail has been added.")</script>';
echo "<script>window.location.href ='add-staff.php'</script>";
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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

 <script>
function checkstaffemail(va) {
  $.ajax({
  type: "POST",
  url: "check_availability.php",
  data:'emailid='+va,
  success: function(data){
    
    $("#chkeml").html(data);
  }
  });

}
</script>


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
                                       
                                        <label for="example-text-input" class="col-2 col-form-label">Branch Name</label>
                                        <div class="col-10">
                                            <select name='branchname' id="branchname" class="form-control white_bg">
     <option value="">Branch Name</option>
      <?php $query=mysqli_query($con,"select * from  tblbranch");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['BranchName'];?>"><?php echo $row['BranchName'];?></option>
                  <?php } ?>  
   </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Staff Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="staffname" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Staff Mobile Number</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="mobilenumber" maxlength="10" required="true" pattern="[0-9]+">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Staff Email</label>
                                        <div class="col-10">
                     <input class="form-control" type="email" onblur="checkstaffemail(this.value)" id="emailid" name="email" required="true">
                            <span id="chkeml"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-2 col-form-label">Staff Password</label>
                                        <div class="col-10">
                                            <input class="form-control" type="password" value="" name="password" required="true">
                                        </div>
                                    </div>
                                    
                                   
                                                                
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-10">
                                          <p style="text-align: center;">  
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Submit</button></p>
                                           
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