<?php
require_once 'config.php';
if(isset($_POST['update'])) {
mysqli_query($link,"UPDATE reservation set  vehicleStatus='" . $_POST['vehicleStatus'] . "', partCost='" . $_POST['partCost'] . "' ,repairCost='" . $_POST['repairCost'] . "' WHERE id='".intval($_GET['id']) . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($link,"SELECT * FROM reservation WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
$total='';
?>
<html>
<head>
<title>Update Reservation Details</title>
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
     
      </br></br></br>
<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Update Reservations</h1>
						</div>
			<div id="examples">
				<form name="frmUser" method="post" action="<?php $_PHP_SELF ?>">
				<h3 style="color:White; text-align: center;"><b><?php if(isset($message)) { echo $message; } ?></b></h3>
				<div class="form-group">
				Username
				<input type="hidden" name="user" class="form-control" value="<?php echo $row['user']; ?>">
				<input type="text" name="user" class="form-control" value="<?php echo $row['user']; ?>" readonly>
				</div>
				<div class="form-group">
				vehicle License Number 
				<input type="text" name="vehicleLN" class="form-control" value="<?php echo $row['vehicleLN']; ?>" readonly>
				</div>
				<div class="form-group">
				Vehicle Service Status 
				<select class="form-control" name="vehicleStatus" required value="<?php echo $row[3]; ?>">
											<option value="" selected hidden>Status</option>
											<option value="inService">In Service</option>
											<option value="fixed">Fixed/ Completed</option>
											<option value="collected">Collected</option>
											<option value="unrepairable">Unrepairable</option>
											
				</select>
				</div>
				<div class="form-group">
				Cost for Parts (€)
				<input type="text" name="partCost" class="form-control" value="<?php echo $row['partCost']; ?>">
				</div>
				<div class="form-group">
				Cost for Repair / Service (€)
				<input type="text" name="repairCost" class="form-control" value="<?php echo $row['repairCost']; ?>">
				</div>
				<?php 
				$total = $row['partCost'] + $row['repairCost'];
				?>
				<div class="form-group">
				TOTAL (€)
				<input type="text" name="total" class="form-control" value="<?php echo $total; ?>" readonly>
				</div>
			</div>
				<div class="form-btn">
				<input  class="btn btn-primary" name = "update" type = "submit" id = "update" value = "Update">
				</div>
					<p style="text-align: center;">
						<a href="#" class="btn btn-danger" id="print" onclick="printContent('examples')">Print</a>
					</p>
					<p style="text-align: center;">
					   <a href="admin.php" class="btn btn-primary">Admin Panel</a>
					</p>
				</form>

				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   <div class="overlay"></div>
      
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <!-- Scrollbar Js Files -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
      </script>

</body>
</html>