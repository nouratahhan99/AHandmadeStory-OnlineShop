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
        $sql="UPDATE orders set status='Cancled By Admin' where ID=$oid";
        if(mysqli_query($conn, $sql))
        {
            print"delete success";
        }else
        {
            echo "Error: <br>" . mysqli_error($conn);
        }
?>


