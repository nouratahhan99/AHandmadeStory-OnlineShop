<?php
session_start();
$usern=$_SESSION['usern'];

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
                    
                    $sql="insert into orders(productid,quantity,pname,status,username) values ($dbprdid,$dbqntt,'$dbpname','pending','$usern')";
                    if (mysqli_query($conn, $sql)) {
                        
        } else {
            echo "Error: <br>" . mysqli_error($conn);
        }
        
                        
                        
                    }    
                    $sql6 ="TRUNCATE $dbmail";
                        if(mysqli_query($conn, $sql6)){
                        print"Success";
                        header("location:main.php");
                        }
                        else
                        {
                            echo "Error: <br>" . mysqli_error($conn);
                        }

?>