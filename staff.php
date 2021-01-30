<?php
// Initialize the session
session_start();
 
// Include config file
require_once "config.php";


$sql = "SELECT user,vehicleType, vehicleLN, vehicleMake, engineType, bookingType, bookingDate FROM vehicle_booking";

$result = $link->query($sql);

$vehicle_booking='';
$name = $vehicleLN = $bookingType = $bookingDate = "";

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
        $vehicle_booking .= "<tr><td>" . $row["user"]."</td><td>". $row["vehicleType"]. "</td><td>". $row["vehicleLN"]. "</td><td>". $row["vehicleMake"]. "</td><td>". $row["engineType"]. "</td><td>". $row["bookingType"]. "</td><td>". $row["bookingDate"]. "</td></tr>";
    }
} else {
    $vehicle_booking = "0 results";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = trim($_POST["name"]);
	$vehicleLN = trim($_POST["vehicleLN"]);
	$bookingType = trim($_POST["bookingType"]);
	$bookingDate = trim($_POST["bookingDate"]);
	
	$querry = "INSERT INTO staff (name, vehicleLN, bookingType, bookingDate ) VALUES (?, ?, ?, ?)";
	if($stmt = mysqli_prepare($link, $querry)) {
					mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_vehicleLN, $param_bookingType, $param_bookingDate );
					$param_name = $name;
					$param_vehicleLN = $vehicleLN;
					$param_bookingType = $bookingType;
					$param_bookingDate = $bookingDate;
					
					if(mysqli_stmt_execute($stmt)){
						echo '<script>alert("Employee Added Successfully")</script>'; 
					} else{
						echo "Something went wrong. Please try again later.";
					}

				// Close statement
				mysqli_stmt_close($stmt);
				}
}
$link->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Schedule</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Ger's Garage</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
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
	  <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

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

<body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="" /></div>
      </div>
      <!-- end loader -->
   
     <div id="content">

               <!-- header -->
      <header>
         <!-- header inner -->
         <div class="container">
            <div class="row">
               <div class="col-lg-3 logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="home.php"><img src="images/logo.png" alt="#"></a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="right_header_info">
                     <ul>
                        <li><img style="margin-right: 15px;" src="images/phone_icon.png" alt="#" /><a href="#">+353 85 751 4768</a></li>
                        <li><img style="margin-right: 15px;" src="images/mail_icon.png" alt="#" /><a href="#">ger_s_garage@gmail.com</a></li>
                        <li><img src="images/search_icon.png" alt="#" /></li>
                         <li>
                           <button type="button" id="sidebarCollapse">
                              <img src="images/menu_icon.png" alt="#" />
                           </button>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>

  
    <h1 style="color:White; text-align: center;">Hi, <b>Admin </b>. Make an Employee Schedule </h1>
    
    <p style="text-align: center;">
	   <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</br>

<div class="container">
	<div class="row about_blog">
       <div class="full text_align_left">
		</br></br>
		
		</br></br>
		<table id="myTable" style="margin-left: auto; margin-right: auto;" class="sortable">
		<h1 style="text-align: center;" >Booking Details Table</h1>
		</br>
		<input style =" position: absolute; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" type="text" id="myInput" onkeyup="myFunction()" placeholder="View Bookings for a Specific Date">
		
				<tr>
					<th>Username</th>
					<th>Vehicle Type </th>
					<th>Vehicle License Number</th>
					<th>Vehicle Make </th>
					<th>Engine Type</th>
					<th>Booking Type </th>
					<th>Booking Date </th>
				</tr>
					<?php echo $vehicle_booking; ?>
		</table>

		
<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Make an Employee Schedule</h1>
						</div>
						<form action="<?php $_PHP_SELF ?>" method="post">
							<div class="form-group">
										<select class="form-control" name="name" required value="<?php echo $name; ?>">
											<option value="" selected hidden>Select Name</option>
											<option value="name1">Name 1</option>
											<option value="name2">Name 2</option>
											<option value="name3">Name 3</option>
											<option value="name4">Name 4</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Employee Name</span>
							</div>							
							<div class="form-group">
								<input class="form-control" type="text" name="bookingType" required placeholder="Booking Type" value="<?php echo $bookingType; ?>">
								<span class="form-label">Service Type</span>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="vehicleLN" required placeholder="Vehicle Licence Number"value="<?php echo $vehicleLN; ?>">
								<span class="form-label">Vehicle Licence Number</span>
							</div>
							<div class="form-group">
								<input class="form-control" type="date" name="bookingDate" required value="<?php echo $bookingDate; ?>">
								<span class="form-label">Service Date</span><span class="help-block"></span>
							</div>
							<div class="form-btn">
								<input type="submit" class="btn btn-primary" value="Submit">
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
		
</div>
</div>
</div>

    <!-- footer -->
      <footer>
         <div class="container">
           <div class="row">
              <div class="col-md-6">
                <div class="full">
                  <h3>Ger's Garage</h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="full">
                   <ul class="social_links">
                      <li><a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                   </ul>
                </div>
              </div>
              <div class="col-md-4">
                 <div class="full">
                    <h4 class="widget_heading">SUBSCRIBE</h4>
                 </div>
                 <div class="full subribe_form">
                    <form>
                      <fieldset>
                         <div class="field">
                           <input type="email" name="mail" placeholder="Enter your email" />
                         </div>
                         <div class="field">
                           <button class="submit_bt">Sumbit</button>
                         </div>
                      </fieldset>
                    </form>
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="full">
                   <h4 class="widget_heading">Usefull Links</h4>
                 </div>
                 <div class="full f_menu">
                    <ul>
                       <li><a href="home.php">Home</a></li>
                       <li><a href="about.html">About</a></li>
                    </ul>
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="full">
                   <h4 class="widget_heading">Contact Details</h4>
                   <div class="full cont_footer">
                     <p><strong>Ger's Garage : Adderess</strong><br><br>Dublin Road, Limerick, Ireland<br>Phone: +353 85 751 4768<br>ger_s_garage@gmail.com</p>
                   </div>
                 </div>
              </div>
           </div>
         </div>
      </footer>
      <!-- end footer -->

      <!-- copyright -->

      <div class="cpy_right">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <p>© 2021 All Rights Reserved</p>
                     </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- right copyright -->

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
	  <script src="js/filter.js"></script>
	  
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
	
</body>
</html>