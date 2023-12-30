<div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <i class="zmdi zmdi-group-work icon-c-logo"></i>
                         
                        <span>Staff Panel </span></a>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        

                       
                      

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/images (1).png" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                                 <?php
$admid=$_SESSION['cmssid'];
$ret=mysqli_query($con,"select StaffName from tblstaff where ID='$admid'");
$row=mysqli_fetch_array($ret);
$name=$row['StaffName'];

?>
     
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome ! <?php echo $name; ?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="staffprofile.php" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="changepassword.php" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-settings"></i> <span>Change Password</span>
                                </a>

                                <!-- item-->
                                

                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                        
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
