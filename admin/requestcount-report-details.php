<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html lang="en">

    <head>
        <title>CMS Reports Counts</title>

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
                                    <h4 class="m-t-0 header-title">Report Counts</h4>
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>
<h5 align="center" style="color:blue">Courier Request Count Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
<tr>
<th>S.NO</th>
<th>Month/Year</th>
<th>Total Courier Listed</th>
<th>Not Picked up yet</th>
<th>Total Courier Pickup</th>
<th>Total Shipped</th>
<th>Total Intransit</th>
<th>Total Arrived at Destination</th>
<th>Out for Delivery</th>
<th>Total Delivered</th>
</tr>
</thead>
<?php
$ret=mysqli_query($con,"select month(CourierDate) as lmonth,year(CourierDate) as lyear,count(ID) as totalcount,count(if(Status='' || Status='' is null,0,null)) as nopickupyet,count(if(Status='Courier Pickup',0,null)) as courierpickup,count(if(Status='Shipped',0,null)) as shipped,count(if(Status='Intransit',0,null)) as intransit,count(if(Status='Arrived at Destination',0,null)) as arides, count(if(Status='Out for Delivery',0,null)) as outdel,count(if(Status='Delivered',0,null)) as delivered from tblcourier where CourierDate between '$fdate' and '$tdate' group by lmonth,lyear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                    <td><?php  echo $cnt;?></td>
                  <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
              <td><?php  echo $total=$row['totalcount'];?></td>
              <td><?php  echo $npytotal=$row['nopickupyet'];?></td>
                  <td><?php  echo $ntotal=$row['courierpickup'];?></td>
                  <td><?php  echo $atotl=$row['shipped'];?></td>
                <td><?php  echo $intotal=$row['intransit'];?></td>
                <td><?php  echo $aritotal=$row['arides'];?></td>
                 <td><?php  echo $outtotal=$row['outdel'];?></td>
                 <td><?php  echo $deltotal=$row['delivered'];?></td>
                </tr>
                <?php
$ftotal+=$total;
$ttlny+=$npytotal;
$fntotal+=$ntotal;
$fatotl+=$atotl;
$fintotal+=$intotal;
$faritotal+=$aritotal;
$fouttotal+=$outtotal;
$fdeltotal+=$deltotal;
$cnt++;
}?>
   
   <tr>
                  <th colspan="2">Total </th>
              <td><?php  echo $ftotal;?></td>
              <td><?php echo $ttlny;?></td>
                  <td><?php  echo $fntotal;?></td>
                  <td><?php  echo $fatotl;?></td>
                <td><?php  echo $fintotal;?></td>
                <td><?php  echo $faritotal;?></td>
                 <td><?php  echo $fouttotal;?></td>
                 <td><?php  echo $fdeltotal;?></td>
                 
                </tr>   

</table>

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