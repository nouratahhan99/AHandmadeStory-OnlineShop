<?php
$uemail=$_GET['em'];
$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ahandmadestory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM users WHERE email='$uemail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $loc=$row['location'];
        print"$loc";
?>