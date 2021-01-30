<?php
// Initialize the session
session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
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
		.popup{
			width:325px;
			height:110px;
			position:fixed;
			z-index:1000;
			background-color:rgba(0, 2, 30, 0.7);
			top:40vh;
			right:5vw;
			padding:10px;
			border-radius10px;
			
		}
		.popup h3{
		color:white;
		}
	  </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="" /></div>
      </div>
      <!-- end loader -->
   
   <div class="wrapper">

      <div class="sidebar">
         <!-- Sidebar  -->
        <nav id="sidebar">

            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="#home">Home</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#why_choose_us">Why Choose Us</a>
                </li>
                <li>
                    <a href="#testimonial">Testimonial</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>

        </nav>
      </div>


      <div id="content">


      <!-- section -->
      <section id="home" class="top_section">
         <div class="row">
            <div class="col-lg-12">
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
	  <div class="popup">
		<h3>Opening Hours:</br>
			Monday - Staurday: 9am - 4pm </br>
			Sunday: Closed </h3>
	  </div>
      <section>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5">
                  <div class="full slider_cont_section">
                     <h4>Welcome </h4>
					 
                     <h3>Ger's Garage</h3>
                     <p>We are the main approved service dealers in Ireland.</p>
                     <div class="button_section">
                        <a href="login.php">Book Now</a>
						<a href="buy.php">Buy Now</a>
                        <a href="about.html">About Us</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                 <div id="slider_main" class="carousel slide" data-ride="carousel">
                     <!-- The slideshow -->
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img src="images/slider_1.png" alt="#" />
                        </div>
                        <div class="carousel-item">
                           <img src="images/slider_2.png" alt="#" />
                        </div>
                     </div>
                     <div class="full center">
                        <a class="carousel-control-prev" href="#slider_main" data-slide="prev">
                          <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <a class="carousel-control-next" href="#slider_main" data-slide="next">
                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end header -->
            </div>
         </div>
      </section>
      <!-- end section -->
      
      <!-- section --> 
      <div id="about" class="section layout_padding">
         <div class="container">
            
            <div class="row">

                 <div class="col-lg-4 margin_top_30">
               <div class="full margin_top_30">
                  <h3 class="main_heading _left_side margin_top_30">About Us</h3>
                  <p class="large">Our goal is to ensure that you are extremely satisfied with your service or repairs every time, whilst always providing value for money.</p>
               </div>
               <div class="full button_section margin_top_30">
                        <a href="about.html">Read More</a>
                     </div>
            </div>

            <div class="col-lg-8">
               <div class="full margin_top_50_rs">
                  <img class="img-responsive" src="images/about_us.png" alt="#" />
               </div>
            </div>

               </div>

         </div>
      </div>
      <!-- end section -->

      <!-- section --> 
      <div class="section layout_padding padding_top_0">
         <div class="container">
            
            <div class="row">

              <div class="col-lg-8">
               <div class="full text_align_right r-img">
                  <img class="img-responsive" src="images/about_us_2.png" alt="#" />
               </div>
            </div>

                 <div class="col-lg-4 margin_top_30">
               <div class="full margin_top_30">
                  <h3 class="main_heading _left_side margin_top_30">Our Services</h3>
                  <p class="large"> Please view our great service offers by clicking on your brand below or simply complete our contact form and our team will be in touch as soon as possible.</p>
               </div>
               <div class="full button_section margin_top_30">
                    <a href="book.html">See More</a>
                  </div>
            </div>

               </div>

         </div>
      </div>
      <!-- end section -->

      <!-- section -->
      <section id="why_choose_us" class="dark_bg_blue layout_padding cross_layout padding_top_0">
        <div class="container">
           <div class="row">
             <div class="col-md-12">
               <div class="full center">
                 <h2 class="heading_main orange_heading">Why Choose Us</h2>
               </div>
             </div>
           </div>
           <div class="row">
              <div class="col-lg-4">
                 <div class="full">
                    <div class="choose_blog text_align_center">
                        <img src="images/c1_icon.png" />
                        <h4>Recommended Services</h4>
                        
                    </div>
                 </div>
              </div>
              <div class="col-lg-4">
                 <div class="full">
                    <div class="choose_blog text_align_center">
                        <img src="images/c2_icon.png" />
                        <h4>WIDE RANGE OF Vehicle Parts</h4>
                        
                    </div>
                 </div>
              </div>
              <div class="col-lg-4">
                 <div class="full">
                    <div class="choose_blog text_align_center">
                        <img src="images/c3_icon.png" />
                        <h4>TRUSTED BY THOUSANDS</h4>
                        
                    </div>
                 </div>
              </div>
              <div class="col-md-12 margin_top_30">
                <div class="full center button_section margin_top_30">
                    <a class="margin_top_30" href="about.html">Read More</a>
                  </div>
              </div>
           </div>
        </div>
      </section>
      <!-- end section -->

       <!-- section -->
      <section id="testimonial" class="dark_bg_orange layout_padding cross_layout_o padding_top_0">
        <div class="container">
           <div class="row">
             <div class="col-md-12">
               <div class="full center">
                 <h2 class="heading_main orange_heading">Testimonials</h2>
               </div>
             </div>
           </div>
           <div class="row">
              <div class="col-md-12">
                <div class="full">
                  <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                           <ul class="carousel-indicators">
                               <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
                               <li data-target="#testimonial_slider" data-slide-to="1" class="active"></li>
                               <li data-target="#testimonial_slider" data-slide-to="2" class="active"></li>
                           </ul>
                     <!-- The slideshow -->
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="testomonial_section">
                              <div class="full center">
                                <div class="client_img">
                                  <img src="images/testimonial.png" alt="#" />
                                </div>
                              </div>
                              <div class="full testimonial_cont text_align_center">
                                <p><strong>Uli Rot</strong><br><strong class="ornage_color">Car Service</strong><br><i>I use this place every year to get my car serviced. Recently had to get the gearbox oil and filter replaced. As always they have done a great job. Highly recommended as the guys at Simply Service are friendly, reliable and trustworthy!!</i></p>
                                <div class="full text_align_center margin_top_30">
                                   <img src="images/testimonial_qoute.png">
                                </div>
                              </div>
                            </div> 
                        </div>

                        <div class="carousel-item">

                           <div class="testomonial_section">
                              <div class="full center">
                                <div class="client_img">
                                  <img src="images/testimonial.png" alt="#" />
                                </div>
                              </div>
                              <div class="full testimonial_cont text_align_center">
                                <p><strong>Lakshitha</strong><br><strong class="ornage_color">Car Repair</strong><br><i>We took my partners car in yesterday and the diagnostics and work was done within a day .Extremely professional and lovely staff .I have booked my car In also and would highly recommend this lovely team</i></p>
                                <div class="full text_align_center margin_top_30">
                                   <img src="images/testimonial_qoute.png">
                                </div>
                              </div>
                            </div>  

                        </div>

                        <div class="carousel-item">

                           <div class="testomonial_section">
                              <div class="full center">
                                <div class="client_img">
                                  <img src="images/testimonial.png" alt="#" />
                                </div>
                              </div>
                              <div class="full testimonial_cont text_align_center">
                                <p><strong>John Charles</strong><br><strong class="ornage_color">Vehicle Parts</strong><br><i>I have been a customer of Ger's Garage since they started. Since the beginning, they have shown a consistent high level of customer service, competitive parts pricing and excellent delivery service.</i></p>
                                <div class="full text_align_center margin_top_30">
                                   <img src="images/testimonial_qoute.png">
                                </div>
                              </div>
                            </div>  

                        </div>

                     </div>
                    
                  </div>
                </div>
              </div>
           </div>
        </div>
      </section>
      <!-- end section -->

      <!-- section -->
      <section id="contact" class="dark_bg_blue layout_padding cross_layout padding_top_0 margin_top_0">
        <div class="container">
           <div class="row">
             <div class="col-md-12">
               <div class="full center">
                 <h2 class="heading_main orange_heading">Contact Us</h2>
               </div>
             </div>
           </div>
           <div class="row">
              <div class="col-md-6">
                 <div class="full">
                    <div class="contact_form">
                        <form>
                          <fieldset class="row">
                            <div class="col-md-12">
                            <div class="full field">
                              <input type="text" placeholder="Your Name" name="name" />
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="full field">
                              <input type="email" placeholder="Email" name="email" />
                            </div>
                          </div>
                            <div class="col-md-12">
                            <div class="full field">
                              <input type="text" placeholder="Phone" name="number" />
                            </div>
                          </div>
                            <div class="col-md-12">
                            <div class="full field">
                              <textarea placeholder="Message"></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="full center">
                              <button class="submit_bt">Send</button>
                            </div>
                          </div>
                          </fieldset>
                        </form>
                    </div>
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="full map_section">
                     <div id="map">
                     </div>
                   </div>
              </div>
            </div>
        </div>
      </section>
      <!-- end section -->

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
                       <li><a href="#home">Home</a></li>
                       <li><a href="#about">About</a></li>
                       <li><a href="#contact">Contact Us</a></li>
                       <li><a href="#testimonial">Testimonial</a></li>
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
    
      <script>
      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 52.66763185219739, lng: -8.5628439440174},
          });

        var image = 'images/location_point.png';
          var beachMarker = new google.maps.Marker({
             position: {lat: 52.66763185219739, lng: -8.5628439440174},
             map: map,
             icon: image
          });
        }
        </script>
        <!-- google map js -->
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
        <!-- end google map js -->

   </body>
</html>