<?php
session_start();
$sess=$_SESSION;
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
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
$prdnum=$row['ID'];
$prdcat=$row['pcategory'];
$prdname=$row['pname'];
$prddate=$row['pdate'];
$prdimg=$row['pimage'];
$prdprice=$row['Price'];
$prdtype=$row['ptype'];
$gal="";
if($prdcat == "Bracelet"){
    $gal="gal_a";
}else if($prdcat == "Necklace"){
    $gal="gal_b";
}else if($prdcat =="Dream catcher"){
    $gal="gal_c";
}


/*
print"<div class='col-md-3'>
                    <div class='services-inner-box'>
						<div class='ser-icon'>
							<img src='$prdimg' class='img-fluid' alt='' />
						</div>
						<h2>$prdname</h2>
						<a class='hvr-radial-in' href='#'>$prdprice LBP</a>
					</div>
                </div><!-- php code -->
                
        ";*/

if(count($sess)==0){
    if($prdtype == "Normal product"){
        print"<div class='col-md-4 col-sm-6 gallery-grid $gal'>
					<div class='gallery-single fix'>
						<img src='$prdimg' class='img-fluid' alt='Image'>
						<div class='img-overlay'>
							<h3>Pn $prdnum <br/>$prdname<br/><a class='hvr-radial-in' href='' data-toggle='modal' data-target='#login'> $prdprice LBP</a></h3>
							
                                                        
                                                            
						</div>
					</div>
				</div>
				
				";

        }
        else{
             print"<div class='col-md-4 col-sm-6 gallery-grid $gal'>
					<div class='gallery-single fix'>
						<img src='$prdimg' class='img-fluid' alt='Image'>
						<div class='img-overlay'>
							<h3>Pn $prdnum <br/>$prdname<br/><input class='form-control' type='text' placeholder='Enter name on $prdtype'/><br/><a class='hvr-radial-in' href=''  data-toggle='modal' data-target='#login'> $prdprice LBP</a></h3>
							
                                                        
                                                            
						</div>
					</div>
				</div>
				
				";
        }
    
}else
{
        if($prdtype == "Normal product"){
        print"<div class='col-md-4 col-sm-6 gallery-grid $gal'>
					<div class='gallery-single fix'>
						<img src='$prdimg' class='img-fluid' alt='Image'>
						<div class='img-overlay'>
							<h3>Pn $prdnum <br/>$prdname<br/>"
                . "<select id='qnt$prdnum' class='form-control'><option value='1' selected>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option></select><br/>"
                . "<a class='hvr-radial-in' onclick='addcart($prdnum)'> $prdprice LBP</a></h3>
							
                                                        
                                                            
						</div>
					</div>
				</div>
				
				";

        }
        else{
             print"<div class='col-md-4 col-sm-6 gallery-grid $gal'>
					<div class='gallery-single fix'>
						<img src='$prdimg' class='img-fluid' alt='Image'>
						<div class='img-overlay'>
							<h3>Pn $prdnum <br/>$prdname<br/><input class='form-control' id='$prdnum' type='text' placeholder='Enter name on $prdtype'/><br/>"
                     . "<select id='qnt$prdnum' class='form-control'><option value='1' selected>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option></select><br/>"
                     . "<a class='hvr-radial-in' onclick='addcartn($prdnum)'> $prdprice LBP</a></h3>
							
                                                        
                                                            
						</div>
					</div>
				</div>
				
				";
        }
/*print"<div class='col-md-4 col-sm-6 gallery-grid gal_a gal_b'>
					<div class='gallery-single fix'>
						<img src='uploads/gallery_img-01.jpg' class='img-fluid' alt='Image'>
						<div class='img-overlay'>
							<h3>Vegetable Food</h3>
							<a href='uploads/gallery_img-01.jpg' data-rel='prettyPhoto[gal]' class='hoverbutton global-radius'><i class='fa fa-picture-o'></i></a>
						</div>
					</div>
				</div>
				
				<div class='col-md-4 col-sm-6 gallery-grid gal_a gal_b'>
					<div class='gallery-single fix'>
						<img src='uploads/gallery_img-02.jpg' class='img-fluid' alt='Image'>
						<div class='img-overlay'>
							<h3>Vegetable Food</h3>
							<a href='uploads/gallery_img-02.jpg' data-rel='prettyPhoto[gal]' class='hoverbutton global-radius'><i class='fa fa-picture-o'></i></a>
						</div>
					</div>
				</div>";*/

    }
    }
        
    }else {
    echo "0 results";
}

?>