<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ahandmadestory";   
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
    }
$prodid=$_GET['prodid'];
$sql="delete from products where ID=$prodid";
$sql1="delete from orders where productid=$prodid";
if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1))
 {
     print"delete success";
     header("location:adminpage.php");
 }else
 {
     echo "Error: <br>" . mysqli_error($conn);
 }
?>
