<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$search = $userid;
?>
<?php
function tree_data($userid){
global $con;
$data = array();
$query = mysqli_query($con,"select * from tree where userid='$userid'");
$result = mysqli_fetch_array($query);
$data['left'] = $result['left'];
$data['right'] = $result['right'];
$data['leftcount'] = $result['leftcount'];
$data['rightcount'] = $result['rightcount'];
return $data;
}
?>
<?php
function tree_datas($userid){
global $con;
$data = array();
$query = mysqli_query($con,"select * from user where id='$userid'");
$result = mysqli_fetch_array($query);
$data = $result['id'] + 1;

return $data;
}
?>
<?php
if(isset($_GET['search-id'])){
$search_id = mysqli_real_escape_string($con,$_GET['search-id']);
if($search_id!=""){
$query_check = mysqli_query($con,"select * from user where email='$search_id'");
if(mysqli_num_rows($query_check)>0){
$search = $search_id;
}
else{
echo '<script>alert("Access Denied");window.location.assign("tree.php");</script>';
}
}
else{
echo '<script>alert("Access Denied");window.location.assign("tree.php");</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
<link rel="shortcut icon" type="image/png" href="favicon.ico"/>
  <title>mlm-home</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
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
 color:#000;
}

</style>
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
        <a class="nav-link" href="payment-received-history.php">
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
        <a class="nav-link" href="payment-received-history.php">
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
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header jumbotron">Tree</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">
<table class="table calculator" align="center" border="0" style="text-align:center">
<tr height="150">
<?php
$data = tree_data($search);
?>
<td><?php echo $data['leftcount'] ?></td>
<td colspan="2"><i class="fa fa-user fa-2x" style="color:#233444"></i><h6><?php echo $search; ?></h6></td>
<td><?php echo $data['rightcount'] ?></td>
</tr>
<tr height="150" style='float:center;'>
<?php
$first_left_user = $data['left'];
$first_right_user = $data['right'];
?>
<style>
  @media all and (max-width:768px) {
        .calculator tr {    display: table;  width:100%;    }

    }

    .calculator tr {    display: table;  width:100%;    }

</style>

<?php



?>
 <?php
									$i=1;
									$query = mysqli_query($con,"select * from user where email='$userid'");
									if(mysqli_num_rows($query)>0){
										while($row=mysqli_fetch_array($query)){
                  
                    }
                  }
										?>
<td colspan="1"><a href="tree.php?search-id=<?php echo $first_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p>

<?php
echo $idinc;

?></p></a></td>


<td colspan="1"><a href="tree.php?search-id=<?php echo $first_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo 2; ?></p></a></td>


<td colspan="1"><a href="tree.php?search-id=<?php echo $first_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo 3; ?></p></a></td>


<td colspan="1"><a href="tree.php?search-id=<?php echo $first_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo 4; ?></p></a></td>


<td colspan="2"><a href="tree.php?search-id=<?php echo $first_right_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo 5; ?></p></a></td>


 <!-- five of second -->



<style>
.ravan{
  font: 70px Tahoma, Helvetica, Arial, Sans-Serif;
	text-align: center;
}
</style>
</tr>
<tr height="150">
<?php
$data_first_left_user = tree_data($first_left_user);
$second_left_user = $data_first_left_user['left'];
$second_right_user = $data_first_left_user['right'];

$data_first_right_user = tree_data($first_right_user);
$third_left_user = $data_first_right_user['left'];
$thidr_right_user = $data_first_right_user['right'];
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($second_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>

<?php
if($second_right_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $second_right_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $second_right_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($third_left_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $third_left_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $third_left_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
<?php
if($thidr_right_user!=""){
?>
<td><a href="tree.php?search-id=<?php echo $thidr_right_user ?>"><i class="fa fa-user fa-2x" style="color:#73B400"></i><p><?php echo $thidr_right_user ?></p></a></td>
<?php
}
else{
?>
<td><i class="fa fa-user fa-2x" style="color:#73B400"></i></td>
<?php
}
?>
</tr>
</table>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mk Services</span>
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
