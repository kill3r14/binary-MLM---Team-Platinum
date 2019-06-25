<?php
include('php-includes/connect.php');
$userid = '';
$capping = 500;
?>
<?php
//User cliced on join
if(isset($_GET['join_user'])){
	$side='';

	$email = mysqli_real_escape_string($con,$_GET['email']);
	$mobile = mysqli_real_escape_string($con,$_GET['mobile']);
	$address = mysqli_real_escape_string($con,$_GET['address']);
	$account = mysqli_real_escape_string($con,$_GET['account']);
	$under_userid = mysqli_real_escape_string($con,$_GET['under_userid']);
	$side = mysqli_real_escape_string($con,$_GET['side']);
	$password = "123456";

	$flag = 0;

	if( $email!='' && $mobile!='' && $address!='' && $account!='' && $under_userid!='' && $side!=''){
		//User filled all the fields.

			//Pin is ok
			if(email_check($email)){
				//Email is ok
				if(!email_check($under_userid)){
					//Under userid is ok
					if(side_check($under_userid,$side)){
						//Side check
						$flag=1;
					}
					else{
						echo '<script>alert("The side you selected is not available.");</script>';
					}
				}
				else{
					//check under userid
					echo '<script>alert("Invalid Under userid.");</script>';
				}
			}
			else{
				//check email
				echo '<script>alert("This user id already availble.");</script>';
			}

	}
	else{
		//check all fields are fill
		echo '<script>alert("Please fill all the fields.");</script>';
	}

	//Now we are heree
	//It means all the information is correct
	//Now we will save all the information
	if($flag==1){

		//Insert into User profile
		$query = mysqli_query($con,"insert into user(`email`,`password`,`mobile`,`address`,`account`,`under_userid`,`side`) values('$email','$password','$mobile','$address','$account','$under_userid','$side')");

		//Insert into Tree
		//So that later on we can view tree.
		$query = mysqli_query($con,"insert into tree(`userid`) values('$email')");

		//Insert to side
		$query = mysqli_query($con,"update tree set `$side`='$email' where userid='$under_userid'");

		//Update pin status to close


		//Inset into Icome
		$query = mysqli_query($con,"insert into income (`userid`) values('$email')");
		echo mysqli_error($con);
		//This is the main part to join a user\
		//If you will do any mistake here. Then the site will not work.




		echo mysqli_error($con);

		echo '<script>alert("regestration successful.");</script>';
	}

}
?><!--/join user-->
<?php
//functions
function pin_check($pin){
	global $con,$userid;

	$query =mysqli_query($con,"select * from pin_list where pin='$pin' and userid='$userid' and status='open'");
	if(mysqli_num_rows($query)>0){
		return true;
	}
	else{
		return false;
	}
}
function email_check($email){
	global $con;

	$query =mysqli_query($con,"select * from user where email='$email'");
	if(mysqli_num_rows($query)>0){
		return false;
	}
	else{
		return true;
	}
}
function side_check($email,$side){
	global $con;

	$query =mysqli_query($con,"select * from tree where userid='$email'");
	$result = mysqli_fetch_array($query);
	$side_value = $result[$side];
	if($side_value==''){
		return true;
	}
	else{
		return false;
	}
}
function income($userid){
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from income where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$data['day_bal'] = $result['day_bal'];
	$data['current_bal'] = $result['current_bal'];
	$data['total_bal'] = $result['total_bal'];

	return $data;
}
function tree($userid){
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
function getUnderId($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['under_userid'];
}
function getUnderIdPlace($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['side'];
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

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
							<style>

.bg-gradient-primary {
    background-color: #233444;
    background-image: -webkit-gradient(linear,left top,left bottom,color-stop(10%,#233444),to(#233444));
    background-image: linear-gradient(180deg,#233444 10%,#233444 100%);
    background-size: cover;
}
.btn-primary {
    color: #fff;
    background-color: #233444;
    border-color: #233444;
}
.btn-primary:hover {
    color: #fff;
    background-color: #73B400;
    border-color: #73B400;
}
</style>

              <form method="post">

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Account</label>
                                <input type="text" name="account" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Under Userid</label>
                                <input type="text" name="under_userid" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Side</label><br>
                                <input type="radio" name="side" value="left"> Reffered
                                <input type="radio" name="side" value="right"> Other
                            </div>

                            <div class="form-group">
                        	<input type="submit" name="join_user" class="btn btn-primary" value="Join">
                        </div>
                        </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
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
