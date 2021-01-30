<?php
// Initialize the session
session_start();
 
// Include config file
require_once "config.php";

$sql1 = "SELECT id,user,vehicleLN, vehicleStatus, partCost, repairCost FROM reservation";
//$sqlUpdate1 = "UPDATE reservation set  user='" . $_POST['user'] . "', vehicleLN='" . $_POST['vehicleLN'] . "'vehicleStatus='" . $_POST['vehicleStatus'] . "', partCost='" . $_POST['partCost'] . "' ,repairCost='" . $_POST['repairCost'] . "' WHERE user='" . $_POST['user'] . "'");
$sql2 = "SELECT first_name, last_name, Mobile_Number, customer_Email, username FROM users";
$sql3 = "SELECT user,vehicleType, vehicleLN, vehicleMake, engineType, bookingType, bookingDate FROM vehicle_booking";
$sql4 = "SELECT id,partName,price FROM vehicle_parts";
$sql5 = "SELECT name,vehicleLN,bookingType,bookingDate FROM staff";
$result1 = $link->query($sql1);
//$UpdateResult = $link->query($sqlUpdate1);
$result2 = $link->query($sql2);
$result3 = $link->query($sql3);
$result4 = $link->query($sql4);
$result5 = $link->query($sql5);
$reservation='';
$users='';
$vehicle_booking='';
$vehicle_parts='';
$staff='';

if ($result2->num_rows > 0) {
    // output data of each row
	
    while($row = $result2->fetch_assoc()) {
        $users .= "<tr><td>" . $row["first_name"]."</td><td>" . $row["last_name"]."</td><td>" . $row["Mobile_Number"]."</td><td>" . $row["customer_Email"]."</td><td>". $row["username"]. "</td></tr>";
    }
} else {
    $users = "0 results";
}

if ($result3->num_rows > 0) {
    // output data of each row
	
    while($row = $result3->fetch_assoc()) {
        $vehicle_booking .= "<tr><td>" . $row["user"]."</td><td>". $row["vehicleType"]. "</td><td>". $row["vehicleLN"]. "</td><td>". $row["vehicleMake"]. "</td><td>". $row["engineType"]. "</td><td>". $row["bookingType"]. "</td><td>". $row["bookingDate"]. "</td></tr>";
    }
} else {
    $vehicle_booking = "0 results";
}

if ($result5->num_rows > 0) {
    // output data of each row
	
    while($row = $result5->fetch_assoc()) {
        $staff .= "<tr><td>" . $row["name"]."</td><td>". $row["vehicleLN"]. "</td><td>". $row["bookingType"]. "</td><td>". $row["bookingDate"]. "</td></tr>";
    }
} else {
    $staff = "0 results";
}


$link->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
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

  
    <h1 style="color:White; text-align: center;">Hi, <b>Admin </b>. Welcome to Ger's Garage </h1>
    
    <p style="text-align: center;">
	   <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</br>

<div class="container">
	<div class="row about_blog">
       <div class="full text_align_left">
		</br></br>
		<table style="margin-left: auto; margin-right: auto;"class="sortable">
		<h1 style="text-align: center;" >Registered User Table</h1>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Mobile Number</th>
					<th>Email</th>
					<th>Username</th>
				</tr>
					<?php echo $users; ?>
		</table>
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
		</br>
		<div id="examples">
		<table style="margin-left: auto; margin-right: auto;" class="sortable">
		<h1 style="text-align: center;" >Staff Rostering Details</h1>
		
					<tr>
					<th>Employee Name</th>
					<th>Vehicle License Number </th>
					<th>Serivce Type</th>
					<th>Service Date </th>
				</tr>
					<?php echo $staff; ?>
		</table>
		</div>
		<p style="text-align: center;">
					   <a href="staff.php" class="btn btn-primary">Assign Staff</a>
		</p>
		<p style="text-align: center;">
						<a href="#" class="btn btn-danger" id="print" onclick="printContent('examples')">Print Schedule</a>
		</p>
		
		</br></br>
		<form action="" method="post">
		<table style="margin-left: auto; margin-right: auto;"  class="sortable">
		<h1 style="text-align: center;" >Status of Service or Repair Table</h1>
				<thead>
					<th>Username</th>
					<th>Vehicle License Number </th>
					<th>Status of Service or Repair </th>
					<th>Cost for Parts</th>
					<th>Cost for Repair</th>
				</thead>
				<tbody>
					<?php
					$i=0;
						while($row = $result1->fetch_assoc()) {
						if($i%2==0)
							$classname="even";
						else
							$classname="odd";
						?>

									<tr>
									<td><?php echo $row["user"]; ?></td>
									<td><?php echo $row["vehicleLN"]; ?></td>
									<td><?php echo $row["vehicleStatus"]; ?></td>
									<td><?php echo $row["partCost"]; ?></td>
									<td><?php echo $row["repairCost"]; ?></td>
									<td><a href="update-reservtion.php? id=<?php echo $row["id"]; ?>">Update</a></td>
									</tr>
					<?php
						$i++;
					}
					?>
				<tbody>
		</table>
		</br>
		</form>
		</br></br>
		<table style="margin-left: auto; margin-right: auto;" class="sortable">
		<h1 style="text-align: center;" >Vehicle Parts Details Table</h1>
				<tr>
					<th>Vehicle Parts</th>
					<th>Price (€) </th>
				</tr>
				<tbody>
					<?php
					$i=0;
						while($row = $result4->fetch_assoc()) {
						if($i%2==0)
							$classname="even";
						else
							$classname="odd";
						?>

									<tr>
									<td><?php echo $row["partName"]; ?></td>
									<td><?php echo $row["price"]; ?></td>
									<td><a href="update-parts.php? id=<?php echo $row["id"]; ?>">Update</a></td>
									</tr>
					<?php
						$i++;
					}
					?>
				<tbody>	
		</table>
		</br>
		
		</br></br>
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