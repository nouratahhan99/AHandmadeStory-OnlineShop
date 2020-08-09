<!DOCTYPE html>
<?php
session_start();
$unam=$_SESSION['usern'];
if(!$unam)
{
    header("location:index.html"); 
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ahandmadestory";        
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM users WHERE email='$unam'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$fname=$row['firstname'];
$lname=$row['lastname'];
$fullname="$fname $lname";
?>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
 
     <!-- Site Metas -->
    <title>A Handmade Story</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo3.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logo10.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("dbitems").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "itemsfill.php", true);
        xmlhttp.send();
    
   
    </script>
    
    <script type="text/javascript">
    function addcart(pid){ 
        var qntt=document.getElementById('qnt'+pid).value;    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("profilefill").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "addcart.php?prodid="+pid+"&qnt="+qntt+"&chname=", true);
        xmlhttp.send();
       
    }
    function addcartn(pid){ 
        var qntt=document.getElementById('qnt'+pid).value; 
        var cname=document.getElementById(pid).value;    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("profilefill").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "addcart.php?prodid="+pid+"&qnt="+qntt+"&chname="+cname, true);
        xmlhttp.send();
       
    }
    
    function removecart(prodid,prodquantt,prodname){
      //  alert("removecart.php?prodid="+prodid+"&qnt="+prodquantt+"&chname="+prodname);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultdelete").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "removecart.php?prodid="+prodid+"&qnt="+prodquantt+"&chname="+prodname, true);
        xmlhttp.send();
        
     
     
    }
   
    </script>
</head>
<body id="page-top" class="politics_version">

    <!-- LOADER -->
    <div id="preloader">
        <div id="main-ld">
			<div id="loader"></div>  
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->
	
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
			<img class="img-fluid" src="uploads/logo10.png" height="30" width="330"  alt="" />
		</a>
        <button class="navbar-toggler navbar-toggler-right"  type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Items
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="#home"><span>Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about"><span>About</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#items"><span>Items</span></a>
            </li>
            
		
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact"><span>Contact Us</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="" data-toggle="modal" data-target="#profile"><span><?php print"$fullname"; ?></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
  
    <!-- start of Modal -->
    <div class="modal fade" id="profile" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php print"$fullname"; ?></h4>
        </div>
        <div class="modal-body">
            <h3><a href="" data-toggle="modal" data-target="#ohistory">Order History</a></h3>
            <div id="profilefill">
                <h3>
                    <?php
                    ////////////////////
                    $umail= str_replace(".", "_dotsign_", $unam);
                    $dbmail= str_replace("@", "_atsign_", $umail);
                    ///////////////////
                    $sql2="select * from $dbmail where status='cart'";
                    $result2 = $conn->query($sql2);
                    $counter=0;
                    while($row2 = $result2->fetch_assoc()) {
                         $counter++;

                       }

                     print"<h3>You have $counter Items in your <a href=''  data-toggle='modal' data-target='#ucart'>cart</a></h3>";  

                    ?>
                </h3>
                
            </div>
            <h3><a href="logoutconf.php">Logout</a></h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    
 <!-- End of Modal -->
 
 
 
 <!-- Start Large Modal -->
 <!-- Cart Modal -->
  <div class="modal fade" id="ucart" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Cart</h4>
        </div>
        <div class="modal-body">
            <table width="100%" border='1' id='resultdelete'>
                
                    <?php
                    $cash1=0;
                    $sql3="select * from $dbmail";
                    $result3 = $conn->query($sql3);
                    while($row3 = $result3->fetch_assoc()) {
                        $dbprdid=$row3['productid'];
                        $dbqntt=$row3['quantity'];
                        $dbpname=$row3['pname'];
                        $dbstat=$row3['status'];
                        
                    $sql4="select * from products where ID='$dbprdid'";
                    $result4 = $conn->query($sql4);
                    $row4 = $result4->fetch_assoc();
                    $dbprdimg=$row4['pimage'];
                    $dbprdname=$row4['pname'];
                    $dbpr1=$row4['Price'];
                    $cash1=$cash1+($dbpr1*$dbqntt);
                    print"<tr><td width='17%'><img src='$dbprdimg' lenght='70%' width='70%'/></td><td width='17%'>$dbprdname</td>"
                            . "<td width='17%'>$dbpname</td><td width='17%'>$dbqntt</td><td width='17%'>$dbstat</td><td width='15%'><a href='' onclick='removecart($dbprdid,$dbqntt,\"$dbpname\");'>Remove</a></td></tr>";    
                        
                        
                    }
                    
                    ?>
                
            </table>
            <a href="checkout.php">CheckOut <?php print"$cash1"; ?> LBP</a>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 <!-- End Cart Modal -->
 
 
 
 <!-- Orders Modal -->
 
   <div class="modal fade" id="ohistory" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Orders</h4>
        </div>
        <div class="modal-body">
            <table width="100%" border='1' id='resultdelete'>
                
                    <?php
                    $cash=0;
                    $sql8="select * from orders where username='$unam'";
                    $result8 = $conn->query($sql8);
                    while($row8 = $result8->fetch_assoc()) {
                        $oid=$row8['ID'];
                        $dbprdid=$row8['productid'];
                        $dbqntt=$row8['quantity'];
                        $dbpname=$row8['pname'];
                        $dbstat=$row8['status'];
                    $sql9="select * from products where ID='$dbprdid'";
                    $result9 = $conn->query($sql9);
                    $row9 = $result9->fetch_assoc();
                    $dbprdimg=$row9['pimage'];
                    $dbprdname=$row9['pname'];
                    $dbpr=$row9['Price'];
                    if($dbstat == 'pending'){
                    $cash=$cash+($dbpr*$dbqntt);}
                    print"<tr>"
                    . "<td width='10%'>$oid</td>"
                            . "<td width='15%'><img src='$dbprdimg' lenght='70%' width='70%'/></td><td width='15%'>$dbprdname</td>"
                            . "<td width='15%'>$dbpname</td><td width='15%'>$dbqntt</td><td width='15%'>$dbstat</td><td width='15%'>$dbstat</td></tr>";    
                        
                        
                    }
                    
                    ?>
                
            </table>
            <h2>Amount to pay: <?php print"$cash"; ?> LBP</h2>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 
 <!-- End Orders Modal -->
 
 
 
 
 <!-- End Large Modal -->
	<section id="home" class="main-banner">
		
		<div class="slider-new-2 owl-carousel owl-theme">
				
			<div class="item slider-screen">
				<div class="slider-img-full">
					<img src="uploads/hand6.jpg" height="600" width="500" alt="" />
				</div>
				<div class="container">
					<div class="slider-content text-white">
						<div class="in-box">
							<h2>Handmade with love for the ones you love!</h2>
							<p>The best gift for all occasions</p>
							<a class="btn-slider hvr-radial-in" href="#items">Learn More</a>
						</div>
					</div>
				</div>
			</div>	
			
			<div class="item slider-screen">
				<div class="slider-img-full">
					<img src="uploads/hand7.jpg" alt="" />
				</div>
				<div class="container">
					<div class="slider-content text-white">
						<div class="in-box">
							<h2>Want to know our full story?</h2>
							
							<a class="btn-slider hvr-radial-in" href="#about">Press Here!</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="item slider-screen">
				<div class="slider-img-full">
					<img src="uploads/hand2.jpg" alt="" />
				</div>
				<div class="container">
					<div class="slider-content text-white">
						<div class="in-box">
							<h2>Customize your product or order ready made items!</h2>
							<p>Pay cash on delivery via @WAKILNI</p>
							<a class="btn-slider hvr-radial-in" href="#items">Order here!</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
	</section>
	
	

    <div id="about" class="section lb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">                        
                        <h2>Welcome to our world!</h2>
                        <p>My name is Noura Tahhan, a 20 years old entrepreneur, the owner of "A Handmade Story". <br>
                            <b> "A Handmade Story" </b> is the newest edition of our handmade world. <br>
                            Previously, our shop was <b> "Your Imagination My Destination"</b>, 
                            established in <u> 2013 </u> through Instagram. <br> 
                            My first exhibition was in 2016, participated in many themed-festivals. <br> 
                            The concept of my shop is to customize a product that may suit all occasions & in the same time
                            it's a memorable and meaningful gift.
                            "A handmade Story" as a name, came from the hundreds of birthdays, surprises and even valentine days
                            that ended with a bracelet that holds a lot of memories and stories to remember.
                            
                            Our product can be sent to a spouse, a family member, a friend and more..
                            <br> Our products are made of 100% pure cotton, they are washable and long-lasting.
                           </p>
						
                        <a href="#" class="sim-btn hvr-radial-in"><span>Contact Us</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="right-box-pro wow fadeIn">
                        <img src="uploads/aboutme.png" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	<div class="section cont-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="inner-cont-box">
						<i class="flaticon-review"></i>
						<h3 class="counter-number">1500</h3>
						<h4>Client</h4>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="inner-cont-box">
						<i class="flaticon-alarm-clock"></i>
						<h3 class="counter-number">5000</h3>
						<h4>Hours Of Work</h4>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="inner-cont-box">
						<i class="flaticon-idea"></i>
						<h3 class="counter-number">400 new</h3>
						<h4>Ideas</h4>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="inner-cont-box">
						<i class="flaticon-projector-screen"></i>
						<h3 class="counter-number">7000</h3>
						<h4>Item Sold</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <div id="items" class="section wb">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h3>Items</h3>
                <p></p>
            </div><!-- end title -->

	
			
			<div class="gallery-menu text-center row">
				<div class="col-md-12">
					<div class="button-group filter-button-group">
						<button class="hvr-radial-in active" data-filter="*">All</button>
						<button class="hvr-radial-in" data-filter=".gal_a">Bracelets</button>
						<button class="hvr-radial-in" data-filter=".gal_b">Necklaces</button>
						<button class="hvr-radial-in" data-filter=".gal_c">Dream catchers</button>
						
					</div>
				</div>
			</div>
			
			<div class="gallery-list row"  id="dbitems">
				
				
			</div>
				
			</div>
		</div>
	
	

    <div id="contact" class="section db">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h3>Contact</h3>
               
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="name" type="text" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="email" type="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email address.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="date" type="text" placeholder="Date" required="required" data-validation-required-message="Please enter Date.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="time" type="text" placeholder="Time" required="required" data-validation-required-message="Please enter Time.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" id="message" placeholder="Your Message" required="required" data-validation-required-message="Please enter a message."></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<button id="sendMessageButton" class="sim-btn hvr-radial-in" data-text="Send Message" type="submit">Send Message</button>
								</div>
							</div>
						</form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	<footer class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="mb-3 img-logo">
						<a href="#">
							 <img src="uploads/logo10.png" alt="" height="100" width="250">
						</a>
						<p>Thank you for visiting our page! Enjoy you shopping!</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<h4 class="mb-4 ph-fonts-style foot-title">
						Recent Link
					</h4>
					<ul class="ph-links-column">
						<li><a href="#" class="text-black">About us</a></li>
						<li><a href="#" class="text-black">Our Items</a></li>
						<li><a href="#" class="text-black">Get In Touch</a></li>
						
					</ul>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<h4 class="mb-4 ph-fonts-style foot-title">
						Contact Us
					</h4>
					<div class="cont-box-footer">
						<div class="cont-line">
							<div class="icon-b">
								<i class="fa fa-map-signs" aria-hidden="true"></i>
							</div>
							<div class="cont-dit">
								<p>Beirut, Lebanon</p>
							</div>
						</div>
						<div class="cont-line">
							<div class="icon-b">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
							</div>
							<div class="cont-dit">
								
								<p><a href="#">+961 76685269</a></p>
							</div>
						</div>
						<div class="cont-line">
							<div class="icon-b">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
							</div>
							<div class="cont-dit">
								<p><a href="#">noura.ta77an@hotmail.com</a></p>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					
					<div class="media-container-column" data-form-type="formoid">
						<div data-form-alert="" class="align-center" hidden="">
							Thanks for filling out the form!
						</div>

						</form>
					</div>

				</div>
			</div>
		</div>
	</footer>

    <div class="copyrights">
        <div class="container-fluid">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-links">
                        <a href="#">Home</a>
                        <a href="#">Blog</a>
                        <a href="#">Pricing</a>
                        <a href="#">About</a>
                        <a href="#">Faq</a>
                        <a href="#">Contact</a>
                    </p>
                    <p class="footer-company-name">All Rights Reserved. &copy; 2020 <a href="#">A Handmade Story</a> <br>
                        Design By: Noura Tahhan</p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<!-- Camera Slider -->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script> 
	<script src="js/parallaxie.js"></script>
	<script src="js/headline.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
</body>
</html>