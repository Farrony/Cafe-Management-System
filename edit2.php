<?php 
		include "include/connectdb.php";

		$update_id=$_GET['menu_id'];
		
	$fetchQuery="SELECT * FROM menu WHERE id=$update_id";

	$result_data=$conn->query($fetchQuery);


	if (isset($_POST['updatedata'])) {

		// $update_id=$_GET['std_id'];

		$name=$_POST['name'];
		$price=$_POST['price'];

		$updateQuery="UPDATE menu SET name='$name',price='$price' WHERE id=$update_id";

		if ($conn->query($updateQuery)==true) {
			// echo "Data Updated";
			header("Location:update2.php");
		}else{
			die($conn->error);
		}
	}

 ?> 


<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- font awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>	
	<h3 style="text-align: center;background: #50A3D7;    text-align: center;
    background: #50A3D7;
    color: white;
    font-weight: bold;
    padding: 10px;
    margin-bottom: 50px;
    margin-top: 40px;">Update Item</h3>

	<!-- dashbord -->
	<hr>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<?php 
		while ($row=$result_data->fetch_assoc()) {
			

	 ?>

	<form action=" <?php $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="">Item Name : </label>
		<input type="text" name="name" value="<?php echo $row['name'];?>" class="in1"><br><br>
		<label for="">Item Price: </label>
		<input type="text" name="price" value="<?php echo $row['price'];?>" class="in2"><br><br>
		
		<input id="btns" type="submit" name="updatedata" value="Update Data">
	</form>

	<?php } ?>

			</div>
		</div>
	</div>

	
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