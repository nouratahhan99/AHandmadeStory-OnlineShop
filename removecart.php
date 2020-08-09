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
 if($prdnam=='undefined')
 {
     $sql ="DELETE FROM $dbmail WHERE productid=$prodid AND quantity=$qntt AND status='cart'";
 }
 else{
 $sql ="DELETE FROM $dbmail WHERE productid=$prodid AND pname='$prdnam' AND quantity=$qntt AND status='cart'";}
 if(mysqli_query($conn, $sql))
 {
     print"delete success";
 }else
 {
     echo "Error: <br>" . mysqli_error($conn);
 }
 
 
 

        
        


?>

