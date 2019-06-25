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

          <!-- Topbar Search -->
          <style>

          </style>
          <i class="fab fa-teamspeak"></i>
          <H2 class="page-header">TEAM PLATINUM</H2>


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
        <div id="page-wrapper">
        <h3 class="jumbotron">Change Password</h3>

<?php
if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT *from user WHERE userid='" . $_SESSION["userid"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($con, "UPDATE user set password='" . $_POST["newPassword"] . "' WHERE userid='" . $_SESSION["userid"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>


<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">

<td colspan="2">Enter old password and confirm new password</td>
</tr>
<tr>
<td width="40%"><label>Current Password</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>


<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
}
return output;
}
</script>
            <!-- /.container-fluid -->
        </div>
        <!-- /.container-fluid -->
        <br><br><br><br><br><br><br><br><br><br><br>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MK Services</span>
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
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
