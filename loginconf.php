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
        
        $uname=$_POST['email'];
        $pass=$_POST['password'];
        if($uname!="admin@admin.com")
        {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ahandmadestory";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM users WHERE email='$uname'";
        print"$sql";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $distpass=$row['password'];
        
    }
    if($pass==$distpass)
    {
        session_start();
        $_SESSION['usern']="$uname";
        header("location:main.php");
    }
    else
    {
        print"<script>alert('Wrong Password');</script>";
        header("Refresh: 1;URL='index.html'");
    }
    }else {
    print"<script>alert('User Not Found');</script>";
        header("Refresh: 1;URL='index.html'");
}
        $conn->close();}
        else
        {
            if($pass=="Administrator2020")
            {
            header("location:adminpage.php");
            }
        }    
        
       
        // put your code here
        ?>
    </body>
</html>
