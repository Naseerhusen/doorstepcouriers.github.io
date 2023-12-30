<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['editid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
 
    
   
   $query=mysqli_query($con, "update  tblcomplains set Remark='$remark', Status='$status' where ID='$cid'");
    if ($query) {
   echo '<script>alert("Remark and Status has been updated.")</script>';
   echo "<script>window.location.href ='closed-complains.php'</script>";
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
        <title>View Complains</title>

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="../plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
      <div id="wrapper">
        <!-- Begin page -->
       
 <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Complaint Details</h4>
 <?php if($msg){?>                                   
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo $msg;?>
</div>
<?php }?>
 <?php
$cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblcomplains where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

    <p><strong>Ticket Number:</strong> <?php  echo $row['TicketNumber'];?></p>
  <p><strong>Complain Date :</strong> <?php  echo $row['CompDate'];?></p>
    
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr>
    <th>Tracking Number</th>
    <td><a href="view-courier.php?tid=<?php echo $row['TrackingNumber'];?>"><?php  echo $row['TrackingNumber'];?></a></td>
   
  </tr>
  <tr>
    <th>Nature of Complain</th>
    <td><?php  echo $row['NatureofComplain'];?></td>
  </tr>
  <tr>
    <th>Detail of Issue</th>
    <td><?php  echo $row['IssuesDesc'];?></td>
  </tr>
 
 
  <tr>
    <th>Remark</th>
    <td><?php  if($row['Remark']==''){
echo "Not Respond yet";
}  else {
 echo  $row['Remark'];
} ;?></td>
  </tr>

<tr>
    <th>Status</th>
    <td><?php  if($row['Status']==''){
echo "Not Respond yet";
}  else {
 echo  $cstatus=$row['Status'];
} ;?></td>
  </tr>

 
</table>


<?php  }  
if ($cstatus==''){
?> 
<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
<form name="submit" method="post" enctype="multipart/form-data"> 
<table width="100%">
<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Status:</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     
     <option value="Closed">Closed</option>
    
   </select></td>
  </tr>


</table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div> <!-- end row -->


</div></div>
</div>



       
            

            <?php include_once('includes/footer.php');?>

</div>
        

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

        <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="../plugins/datatables/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

    </body>
</html>
<?php }  ?>
