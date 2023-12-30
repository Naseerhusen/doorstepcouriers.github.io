<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmssid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
    $cid=$_GET['editid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
 
    
   $query=mysqli_query($con,"insert into tblcouriertracking(CourierId,remark,status) value('$cid',' $remark','$status')");
   $query.=mysqli_query($con, "update  tblcourier set Status='$status' where ID='$cid'");
    if ($query) {
    $msg="Remark and Status has been updated.";
     echo '<script>alert("Remark and Status has been updated.")</script>';
    echo "<script>window.location.href ='total-courier.php'</script>";
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
        <title>View Courier</title>

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
                                    <h4 class="m-t-0 header-title">Courier View</h4>
 <?php if($msg){?>                                   
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo $msg;?>
</div>
<?php }?>
 <?php
$cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblcourier where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

    <p><strong>Reference Number:</strong> <?php  echo $row['RefNumber'];?></p>
  <p><strong>Courier Date :</strong> <?php  echo $row['CourierDate'];?></p>
    <div class="row">                                    
<div class="col-6">


      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">    
      <tr>
        <th style="text-align: center" colspan="2">Sender Details</th>
      </tr>    

   <tr>
    <th>Sender Branch</th>
    <td><?php  echo $row['SenderBranch'];?></td>
  </tr>
  <tr>
    <th>Sender Name</th>
    <td><?php  echo $row['SenderName'];?></td>
  </tr>
  <tr>
    <th>Sender Contact Number</th>
    <td><?php  echo $row['SenderContactnumber'];?></td>
  </tr>
  <tr>
    <th>Sender Address</th>
    <td><?php  echo $row['SenderAddress'];?></td>
  </tr>
  <tr>
    <th>Sender City</th>
    <td><?php  echo $row['SenderCity'];?></td>
  </tr>
  <tr>
    <th>Sender State</th>
    <td><?php  echo $row['SenderState'];?></td>
  </tr>
  <tr>
    <th>Sender Pincode</th>
    <td><?php  echo $row['SenderPincode'];?></td>
  </tr>
  <tr>
    <th>Sender Country</th>
    <td><?php  echo $row['SenderCountry'];?></td>
  </tr>
</table>
</div>
<div class="col-6">
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
       <tr>
        <th style="text-align: center" colspan="2">Recipient Details</th>
      </tr>  

  <tr>
    <th>Recipient Name</th>
    <td><?php  echo $row['RecipientName'];?></td>
  </tr>
  <tr>
    <th>Recipient Contact Number</th>
    <td><?php  echo $row['RecipientContactnumber'];?></td>
  </tr>
  <tr>
    <th>Recipient Address</th>
    <td><?php  echo $row['RecipientAddress'];?></td>
  </tr>
  <tr>
    <th>Recipient City</th>
    <td><?php  echo $row['RecipientCity'];?></td>
  </tr>
  <tr>
    <th>Recipient State</th>
    <td><?php  echo $row['RecipientState'];?></td>
  </tr>
  <tr>
    <th>Recipient Pincode</th>
    <td><?php  echo $row['RecipientPincode'];?></td>
  </tr>
  <tr>
    <th>Recipient Country</th>
    <td><?php  echo $row['RecipientCountry'];?></td>
  </tr>
</table>
</div></div>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr>
    <th>Courier Description</th>
    <td><?php  echo $row['CourierDes'];?></td>
  </tr>
  <tr>
    <th>Parcel Weight</th>
    <td><?php  echo $row['ParcelWeight'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Length</th>
    <td><?php  echo $row['ParcelDimensionlen'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Width</th>
    <td><?php  echo $row['ParcelDimensionwidth'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Height</th>
    <td><?php  echo $row['ParcelDimensionheight'];?></td>
  </tr>
  <tr>
    <th>Parcel Price</th>
    <td><?php  echo $row['ParcelPrice'];?></td>
  </tr>

  
  

<tr>
    <th>Status</th>
    <td><?php  if($row['Status']=='0'){
echo "Not Picked yet";
}  else {
 echo  $pstatus=$row['Status'];
} ;?></td>
  </tr>

  </tr>
</table>
<?php } ?>

<?php  if($row['Status']!='0'){
$ret=mysqli_query($con,"select tblcouriertracking.remark,tblcouriertracking.status as corstatus,tblcouriertracking.StatusDate from tblcourier  left join tblcouriertracking on tblcouriertracking.CourierId=tblcourier.ID where tblcourier.ID='$cid'");
$cnt=1;


 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" >Courier History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['remark'];?></td> 
  <td><?php  echo $row['corstatus'];?></td> 
   <td><?php  echo $row['StatusDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
if ($pstatus!='Delivered'){
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
    <th>Staff Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Status:</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Courier Pickup" selected="true">Courier Pickup</option>
     <option value="Shipped">Shipped</option>
     <option value="Intransit">Intransit</option>
     <option value="Arrived at Destination">Arrived at Destination</option>
     <option value="Out for Delivery">Out for Delivery</option>
     <option value="Delivered" style="color: green">Delivered</option>
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
