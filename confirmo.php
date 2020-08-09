<?php
$oid=$_GET['em'];
$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ahandmadestory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="UPDATE orders set status='Complete' where ID=$oid";
        if(mysqli_query($conn, $sql))
        {
            print"Confirm success";
        }else
        {
            echo "Error: <br>" . mysqli_error($conn);
        }
?>

