<?php

session_start();
$usern=$_SESSION['usern'];
$prodid=$_GET['prodid'];
$prdnam=$_GET['chname'];
$qntt=$_GET['qnt'];


////////////////////
$umail= str_replace(".", "_dotsign_", $usern);
$dbmail= str_replace("@", "_atsign_", $umail);
///////////////////


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ahandmadestory";   
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
    }
 $sql = "INSERT INTO $dbmail (productid, quantity, pname, status)
        VALUES ('$prodid', '$qntt', '$prdnam', 'cart')";
 mysqli_query($conn, $sql);
 $sql2="select * from $dbmail where status='cart'";
 $result = $conn->query($sql2);
 $counter=0;
 while($row = $result->fetch_assoc()) {
        $counter++;
        
    }

    print"<h3>You have $counter Items in your <a href=''>cart</a></h3>";


        
        


?>

