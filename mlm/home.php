<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>mlm-home</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-network-wired"></i>
        </div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop.php">
        <i class="fas fa-shopping-cart"></i>
          <span>Shop</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="pin-request.php">
          <i class="fas fa-fw fa-atom"></i>
          <span>Pin Request</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="pin.php">
          <i class="fas fa-fw fa-eye"></i>
          <span>View Pin</span></a>
      </li>
      <!-- Divider -->
      <li class="nav-item">
        <a class="nav-link" href="join.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Join User</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="tree.php">
          <i class="fas fa-fw fa-tree"></i>
          <span>Tree</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="payment-received-history.php">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Payment Received History</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="Withdrawals.php">
        <i class="fas fa-university"></i>
          <span>Withdrawals</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" style='background:' class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div style='margin-left:-9px;' class="topbar-divider d-none d-sm-block"></div>
          <i class="fab fa-teamspeak"></i>
          <H2 class="page-header"><a style='text-decoration:none;color:#606D78;' href="#">TEAM PLATINUM</a></H2>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <!-- Nav Item - Alerts -->


            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" ><?php
									$i=1;
									$query = mysqli_query($con,"select * from user where email='$userid'");
									if(mysqli_num_rows($query)>0){
										while($row=mysqli_fetch_array($query)){
                      $email = $row['email'];

										?>

                                            	<h6 ><?php echo $email ?></h6>


                                        <?php
											$i++;
										}
									}
									else{
									?>
                                    	<tr>
                                        	<td colspan="2">Unable to connect database</td>
                                        </tr>
                                    <?php
									}
                ?></span>
                <img class="img-profile rounded-circle" src="img/face1.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="settings.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="activity.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

 <!-- Page Content -->
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header jumbotron">User Home</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	 <?php
						$query = mysqli_query($con,"select * from income where userid='$userid'");
						$result = mysqli_fetch_array($query);
					?>
                	<div class="col-lg-3">
                    	<div class="panel panel-info">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Today's Income</h4>
                            </div>

                            <div class="panel-body">
                            <i class="fas fa-comment-dollar"></i>
                            	<?php
								echo $result['day_bal']
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    	<div class="panel panel-success">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Current Income</h4>
                            </div>
                            <div class="panel-body">
                            <i class="fas fa-comment-dollar"></i>
                            	<?php
								echo $result['current_bal']
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    	<div class="panel panel-danger">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Total Income</h4>
                            </div>
                            <div class="panel-body">
                            <i class="fas fa-comment-dollar"></i>
                            	<?php
								echo $result['total_bal']
								?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    	<div class="panel panel-warning">
                        	<div class="panel-heading">
                            	<h4 class="panel-title">Available Pin</h4>
                            </div>
                            <div class="panel-body">
                            <i class="fas fa-prescription-bottle"></i>
                            	<?php
								echo  mysqli_num_rows(mysqli_query($con,"select * from pin_list where userid='$userid' and status='open'"));
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <!-- Footer -->
      <br><br> <br><br> <br><br> <br><br><br><br><br><br>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MK services</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<style>


.body{
    font-family:"Roboto",sans-serif;
  }
.col-lg-3{
  background:#fff;
  margin:30px;
  padding:40px;
  color:#233444;
  border-radius:20px;
  display:absolute;
  font-family:"Roboto",sans-serif;
  -webkit-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-transition:all .3s;
  -o-transition:all .3s;
  -webkit-transition:all .3s;
  transition:all .3s;
}
.col-lg-3:hover{
  background:#73B400;
  margin:30px;
  padding:40px;
  color:#fff;
  border-radius:20px;
  display:absolute;
  font-family:"Roboto",sans-serif;
  -webkit-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-transition:all .3s;
  -o-transition:all .3s;
  -webkit-transition:all .3s;
  transition:all .3s;
}
.navbar-nav{
  -webkit-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-transition:all .3s;
  -o-transition:all .3s;
  -webkit-transition:all .3s;
  transition:all .3s;
}
.jumbotron:hover{

  -moz-transition:all .3s;
  -o-transition:all .3s;
  -webkit-transition:all .3s;
  border: 2px solid #73B400   ;
  transition:all .3s;

}
.jumbotron{
background:#F2F3F6;
border-radius:30px;
color:#233444;

}
.fa-network-wired:hover{
  color:#73B400;

}

.nav-item:hover{
  background:#73B400;

  color:#fff;
  border-radius:10px;
  display:absolute;
  font-family:"Roboto",sans-serif;
  -webkit-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-box-shadow:0 1px 5px rgba(0,0,0,.3);
  -moz-transition:all .3s;
  -o-transition:all .3s;
  -webkit-transition:all .3s;
  transition:all .3s;
}
.btn-primary:hover{
  background:#73B400;
}
.btn-primary{
  background:#233444;
}
.navbar-nav{
  background:#233444;
}
.fas{
  font-size:40px;
  margin-right:10px;
}
.bg-white {
    background-color: #233444!important;
}
h6:hover{
  color:#fff;
}

</style>