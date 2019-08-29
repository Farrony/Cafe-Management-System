<?php 
	session_start();
	if (isset($_SESSION['login_auth']) || isset($_COOKIE['login_auth_cookie']))
	{

 ?>
<!-- dashbord -->
	<?php 

	include "include/connectdb.php";
// data insert code 
	$result=null;

	if (isset($_POST['insertdata'])) {
		$name=$_POST['name'];
		$address=$_POST['address'];
		// $book_category=$_POST['book_category'];
		$birthdate=$_POST['birthdate'];
		$gender=$_POST['gender'];

		// echo $firstname." ".$lastname." ".$age." ".$section_id;

		$insertQuery="INSERT INTO `employee`(`id`,`name`,`address`,`birthdate`,`gender`) VALUES ('','$name','$address','$birthdate','$gender')";

		// $conn->query($insertQuery);

		if ($conn->query($insertQuery)==true) {
			$result="Data Inserted Successfully";
		}else {
			die($conn->error);
		}
	} 

	// search
	
	$flag=0;
	if (isset($_POST['search_btn'])) {
		$search_data=$_POST['search_data'];
		$fetchQuery="SELECT * FROM employee WHERE name LIKE 
		'%$search_data'";
		$flag=1;

	}
	if ($flag==0) {
	
		$fetchQuery="SELECT * FROM employee";
		
	}
// datafetch code

	// $fetchQuery="SELECT * FROM student";

	$result_data=$conn->query($fetchQuery);

 ?>
<!-- dashbord -->



<!DOCTYPE html>
<html>
<head>
	<title>Profile page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- font awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper2">
	<!-- top area -->
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-md-1">
						<img class="imglogo" src="image/nsulogo.png">
					</div>
					<div class="col-md-11">
						<h4>Automation System for NSU Cafetaria</h4>
					</div>
				</div>
			</div>
		</div>
	<!-- top area ends -->

	<!-- top menu -->
		<div class="menu">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-2">
						<nav style="border-bottom: 1px solid #50a3d7;" class="navbar">
						  <div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						    </div>

						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      <ul class="nav navbar-nav navbar-left">
						        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
						        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>

						        <!-- <li>
						        <a href="employee.php"><i class="fa fa-pencil-square-o"></i> Employee</a>
						        </li> -->
						        <li class="Employee">
							          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil-square-o"></i>  Employee<span class="caret"></span></a>
							          <ul class="dropdown-menu">
							            <li><a href="employee.php">Add Employee</a></li>
							            <li><a href="update.php">Update Employee</a></li>
							            <li><a href="update.php">Employee List</a></li>
							          </ul>
							      </li>
							      <li class="Menu">
							          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil-square-o"></i>  Menu<span class="caret"></span></a>
							          <ul class="dropdown-menu">
							            <li><a href="menu.php">Add Item</a></li>
							            <li><a href="update2.php">Update Item</a></li>
							            <li><a href="update2.php">Item List</a></li>
							          </ul>
							      </li>
						        <li><a href="#"><i class="fa fa-reply"></i> Complain Box</a></li>
						        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
						      </ul>
						    </div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
			</div>
		</div>
	<!-- top menu ends -->

		<div class="container-fluid">
			<div class="row">
			<div class="col-md-2">
				<div style="border-right:1px solid #50a3d7;height: 100%;">
					<h4><i class="fa fa-cog"></i> Settings</h4>
				</div>
			</div>
		<div class="col-md-10">
					
	<h3 style="text-align: center;background: #50A3D7;    text-align: center;
    background: #50A3D7;
    color: white;
    font-weight: bold;
    padding: 10px;
    margin-bottom: 50px;
    margin-top: 40px;">New Employee Registration</h3>

	<!-- dashbord -->
	<h1 class="result"><?php echo $result; ?></h1>
	<h2>New Employee Registration</h2>
	<hr>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<label class="lb1"  for="">Enter Employee Name : </label>
		<input class="in1"  type="text" name="name"><br><br>
		<label class="lb2"  for="">Enter  Employee address: </label>
		<input class="in2"  type="text" name="address"><br><br>
		<label class="lb3"  for="">Birth Date : </label>
		<input class="in3"  type="date" name="birthdate"><br><br>
		<label class="lb4"  for="">Gender</label><br>
		<input class="in4"  type="radio" name="gender" value="male" checked> Male<br>
  		<input type="radio" name="gender" value="female"> Female<br>

		<br><input id="insert" type="submit" name="insertdata" value="Insert Data">
	</form>

	
	
			<?php
		}

	 ?>
	<!-- dashbord -->

		<!-- script -->
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <!-- bootstrap cdn -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- wow js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</body>
  


</html>