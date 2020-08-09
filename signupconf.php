<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $uemail=$_POST['email'];
        $upass=$_POST['password'];
        $ubday=$_POST['bday'];
        $uloc=$_POST['location'];
        $sdate=date('yy-m-d');
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ahandmadestory";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO users (email, firstname, lastname, password, location, birthdate, signupdate)
        VALUES ('$uemail', '$fname', '$lname', '$upass', '$uloc', '$ubday', '$sdate')";
        $umail= str_replace(".", "_dotsign_", $uemail);
        $dbmail= str_replace("@", "_atsign_", $umail);
        $sql2 = "CREATE TABLE $dbmail (
                id INT(6),
                productid INT(6) NOT NULL,
                quantity INT(6),
                pname VARCHAR(30),
                status VARCHAR(30) NOT NULL
                )";
        echo "$sql2 <br/>";
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
            echo "New record created successfully";
            header ("Refresh: 2;URL='index.html'");
        } else {
            echo "Error: <br>" . mysqli_error($conn);
        }
        
        // put your code here
        ?>
    </body>
</html>
