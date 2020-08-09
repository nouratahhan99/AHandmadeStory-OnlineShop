<!DOCTYPE html>
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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

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
    <script type='text/javascript'>
    function removeitm(pid){
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultdelete").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "removeitem.php?prodid="+pid, true);
        xmlhttp.send(); 
    }
    
    function checkloc(uemail){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "checkemail.php?em="+uemail, true);
        xmlhttp.send();
    }
    function confirmo(oid){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "confirmo.php?em="+oid, true);
        xmlhttp.send();
    }
    function removeo(oid){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "removeo.php?em="+oid, true);
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
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Items
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="#home"><span>Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#additem"><span>Add Item</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"  href="" data-toggle="modal" data-target="#ritem"><span>Remove Item</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"  href="" data-toggle="modal" data-target="#chor"><span>Check Orders</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="logoutconf.php"><span>Logout</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    
    <!-- Remove Item Modal -->
  <div class="modal fade" id="ritem" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Items</h4>
        </div>
        <div class="modal-body">
            <table width="100%" border='1' id=''>
                
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "ahandmadestory";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql="select * from products";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                    $dbprdimg=$row['pimage'];
                    $dbprdname=$row['pname'];
                    $dbpr1=$row['Price'];
                    $dbprid=$row['ID'];
                    $dpcat=$row['pcategory'];
                    $dptype=$row['ptype'];
                    print"<tr>"
                            . "<td width='14%'>$dbprid</td>"
                            . "<td width='14%'><img src='$dbprdimg' lenght='70%' width='70%'/></td>"
                            . "<td width='14%'>$dbprdname</td>"
                            . "<td width='14%'>$dpcat</td>"
                            . "<td width='14%'>$dptype</td>"
                            . "<td width='14%'>$dbpr1</td>"
                            . "<td width='14%'><a onclick='removeitm($dbprid)'>Remove Item</a></td>"
                            . "</tr>";    
                    }
                    
                    
                    ?>
                
            </table>
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 <!-- End Cart Modal -->
    
 
     <!-- Check Orders Modal -->
  <div class="modal fade" id="chor" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Items</h4>
        </div>
        <div class="modal-body">
            <table width="100%" border='1' id=''>
                
                    <?php
 
                    $sql3="select * from orders";
                    $result2 = $conn->query($sql3);
                    while($row2 = $result2->fetch_assoc()){
                    $oid=$row2['ID'];
                    $opid=$row2['productid'];
                    $opq=$row2['quantity'];
                    $opname=$row2['pname'];
                    $opstat=$row2['status'];
                    $opmail=$row2['username'];
                    if($opstat == "pending")
                    {
                    $sql4="select * from products where ID='$opid'";
                    $result4 = $conn->query($sql4);
                    $row4 = $result4->fetch_assoc();
                    $dbprdimg=$row4['pimage'];
                    $dbprdname=$row4['pname'];
                    $dbpr1=$row4['Price'];
                    print"<tr>"
                            . "<td>$oid</td>"
                            . "<td><img src='$dbprdimg' length='50%' width='50%' /></td>"
                            . "<td>$dbprdname</td>"
                            . "<td>$opname</td>"
                            . "<td>$dbpr1</td>"
                            . "<td onclick='checkloc(\"$opmail\")'>$opmail</td>"
                            . "<td onclick='confirmo(\"$oid\")'>Confirm Order</td>"
                            . "<td onclick='removeo(\"$oid\")'>Remove Order</td>"
                            . "</tr>";    
                    }
                    }
                    
                    
                    ?>
                
            </table>
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 <!-- End Cart Modal -->
 
 
        <div id="additem" class="section db">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h3>Add Product</h3>
                <p>Fill the table below</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="additem" name="sentMessage" method="post" action="addprodconf.php" novalidate="novalidate"  enctype="multipart/form-data">
                            <select name='pcat' style="background-color: #e4606d;
    margin-bottom: 30px;
    border: 1px solid #ebebeb;
    box-sizing: border-box;
    color: #ffffff;
    font-size: 16px;
    outline: 0 none;
    padding: 10px 25px;
    height: 55px;
    resize: none;
    box-shadow: none !important;
    width: 100%;
	border-radius: 0px;">
                                <option selected>Please choose product you want to add</option>
                                <option>Bracelet</option>
                                <option>Necklace</option>
                                <option>Dreamcatcher</option>
                            </select>	
                            <select name='ptype' style="background-color: #e4606d;
    margin-bottom: 30px;
    border: 1px solid #ebebeb;
    box-sizing: border-box;
    color: #ffffff;
    font-size: 16px;
    outline: 0 none;
    padding: 10px 25px;
    height: 55px;
    resize: none;
    box-shadow: none !important;
    width: 100%;
	border-radius: 0px;">
                                <option selected>Please choose type of product</option>
                                <option>Customized Product</option>
                                <option>Ready-Made Product</option>
                            </select>
                            <input class="form-control" id="pname" name='pname' type="text"
                                   placeholder="Please Enter Product Name" required="required" 
                                   data-validation-required-message="Please enter Name." style="background-color: #e4606d;">
                            
                            <input class="form-control" id="price" name='price' type="text" 
                                   placeholder="Please Enter Product Price in lbp" required="required"
                                   data-validation-required-message="Please enter Price." style="background-color: #e4606d;">
                            <input type="file" name="fileToUpload"><br />
                            
                            <button id="sendMessageButton" class="sim-btn hvr-radial-in" 
                                    data-text="Send Message" type="submit">Add Item</button>
			</form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    
    
<!-- end container -->
    </div>
    
        <?php
        // put your code here
        ?>
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
