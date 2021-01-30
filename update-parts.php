<?php
require_once 'config.php';
if(isset($_POST['update'])) {
mysqli_query($link,"UPDATE vehicle_parts set  partName='" . $_POST['partName'] . "', price='" . $_POST['price'] . "'  WHERE id='".intval($_GET['id']) . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($link,"SELECT * FROM vehicle_parts WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>  
<html>
<head>
<title>Update Vehicl Parts Details</title>
<!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
	  <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style2.css">
	  <link rel="stylesheet" href="css/booking.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Tweaks for older IEs-->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
	   <style>
body {
  background-image: url('images/purple_bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style> 
</head>
<body>

<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Update Vehicle Parts Details</h1>
						</div>

					<form name="frmUser" method="post" action="<?php $_PHP_SELF ?>">
					<h3 style="color:White; text-align: center;"><b><?php if(isset($message)) { echo $message; } ?></b></h3>
					
					<div class="form-group">
					Name of the Part:: 
					<input type="text" name="partName" class="form-control" value="<?php echo $row['partName']; ?>">
					</div>
					<div class="form-group">
					Price :
					<input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
					</div>
					<div class="form-btn">
					<input  class="btn btn-primary" name = "update" type = "submit" id = "update" value = "Update">
					</div>
						<p style="text-align: center;">
						   <a href="admin.php" class="btn btn-primary">Admin Panel</a>
						</p>
					</form>


					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>