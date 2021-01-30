<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$user = $_SESSION["username"];
$user = $vehicleType = $vehicleLN = $vehicleMake = $engineType = $bookingType = $bookingDate = $anynote ="";
$vehicleType_err = $vehicleLN_err = $vehicleMake_err = $engineType_err = $bookingType_err = $bookingDate_err = $anynote_err =""; 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
	if(empty(trim($_POST["vehicleType"]))){
        $vehicleType_err = "Please enter the vehicle type.";
    } else{
        $vehicleType = trim($_POST["vehicleType"]);
    }
	if(empty(trim($_POST["vehicleLN"]))){
        $vehicleLN_err = "Please enter the vehicle licence number.";
    } else{
        $vehicleLN = trim($_POST["vehicleLN"]);
    }
	if(empty(trim($_POST["vehicleMake"]))){
        $vehicleMake_err = "Please enter a vehicle make.";
    } else{
        $vehicleMake = trim($_POST["vehicleMake"]);
    }
	if(empty(trim($_POST["engineType"]))){
        $engineType_err = "Please enter a engine type.";
    } else{
        $engineType = trim($_POST["engineType"]);
    }
	if(empty(trim($_POST["bookingType"]))){
        $bookingType_err = "Please enter a booking type.";
    } else{
        $bookingType = trim($_POST["bookingType"]);
    }
	if(empty(trim($_POST["bookingDate"]))){
        $bookingDate_err = "Please enter a booking date.";
    } else{
		$sql = "SELECT id FROM vehicle_booking  where bookingDate = ? group by id Having Count(bookingType)>=1;";
		if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_bookingDate);
            
            // Set parameters
            $param_bookingDate = trim($_POST["bookingDate"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // store result
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) > 1){
                    $bookingDate_err = "Today reservations are filled";
                } else{
                    $bookingDate = trim($_POST["bookingDate"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
	
	$anynote = trim($_POST["anynote"]);
	
    // Check input errors before inserting in database
    if(empty($vehicleType_err) && empty($vehicleLN_err) && empty($vehicleMake_err) && empty($engineType_err) && empty($bookingType_err) && empty($bookingDate_err) ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO vehicle_booking (user, vehicleType, vehicleLN, vehicleMake, engineType, bookingType, bookingDate, anynote) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss",$_SESSION["username"] , $param_vehicleType, $param_vehicleLN, $param_vehicleMake, $param_engineType, $param_bookingType, $param_bookingDate,  $anynote );
            
            // Set parameters
			//$param_user = $user;
            $param_vehicleType = $vehicleType;
			$param_vehicleLN = $vehicleLN;
			$param_vehicleMake = $vehicleMake;
			$param_engineType = $engineType;
			$param_bookingType = $bookingType;
			$param_bookingDate = $bookingDate;
			$param_anynote = $anynote;
                        
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: home.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
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

  
    <h1 style="color:White; text-align: center;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Ger's Garage </h1>
    
    <p style="text-align: center;">
	   <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
	
</br>
  <div class="container">
	<div class="row about_blog">
       <div class="full text_align_left">

<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Make your reservation</h1>
						</div>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div class="form-group">
								<input class="form-control"  name ="user"  value="<?php echo $_SESSION["username"]; ?>" readonly>
								<span class="form-label">Username</span>
							</div>							
							<div class="form-group"<?php echo (!empty($vehicleType_err)) ? 'has-error' : ''; ?>">
								<input class="form-control" type="text" name="vehicleType" required placeholder="Vehicle Type" value="<?php echo $vehicleType; ?>">
								<span class="form-label">Vehicle Type<?php echo $vehicleType_err; ?></span>
							</div>
							<div class="form-group"<?php echo (!empty($vehicleLN_err)) ? 'has-error' : ''; ?>">
								<input class="form-control" type="text" name="vehicleLN" required placeholder="Vehicle Licence Number"value="<?php echo $vehicleLN; ?>">
								<span class="form-label">Vehicle Licence Number<?php echo $vehicleLN_err; ?></span>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group"<?php echo (!empty($vehicleMake_err)) ? 'has-error' : ''; ?>">
										<select class="form-control" name="vehicleMake" required value="<?php echo $vehicleMake; ?>">
											<option value="" selected hidden>Vehicle Make</option>
											<option value="toyota">Toyota</option>
											<option value="nissan">Nissan</option>
											<option value="bmw">BMW</option>
											<option value="benz">Benz</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Vehicle Make<?php echo $vehicleMake_err; ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group"<?php echo (!empty($engineType_err)) ? 'has-error' : ''; ?>">
										<select class="form-control" name="engineType" required value="<?php echo $engineType; ?>">
											<option value="" selected hidden>Engine Type</option>
											<option value="petrol">Petrol</option>
											<option value="diesel">Diesel</option>
											<option value="hybrid">Hybrid</option>
											<option value="electric">Electric</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Engine Type<?php echo $engineType_err; ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group"<?php echo (!empty($bookingType_err)) ? 'has-error' : ''; ?>">
										<select class="form-control" name="bookingType" required value="<?php echo $bookingType; ?>">
											<option value="" selected hidden>Booking Type</option>
											<option value="annual">Annual</option>
											<option value="major">Major</option>
											<option value="repair">Repair</option>
											<option value="majorRepair">Major Repair</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Booking Type<?php echo $bookingType_err; ?></span>
									</div>
								</div>
							</div>
							<div class="form-group"<?php echo (!empty($bookingDate_err)) ? 'has-error' : ''; ?>">
										<input class="form-control" type="date" name="bookingDate" required value="<?php echo $bookingDate; ?>">
										<span class="form-label">Booking Date</span><span class="help-block"><?php echo $bookingDate_err; ?></span>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="anynote" placeholder="Any Note" value="<?php echo $anynote; ?>">
								<span class="form-label">Any Note</span>
							</div>
							<div class="form-btn">
								<input type="submit" class="btn btn-primary" value="Submit">
							</div>
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