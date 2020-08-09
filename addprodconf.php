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
$target_dir = "products/";
$target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
print"$target_file";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $pnam=$_POST['pname'];
        $pcat=$_POST['pcat'];
        $ptype=$_POST['ptype'];
        $pdate=date('yy-m-d');
        $pprice=$_POST['price'];
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ahandmadestory";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO products (pcategory, ptype, pname, pimage, pdate, Price)
        VALUES ('$pcat', '$ptype', '$pnam', '$target_file', '$pdate','$pprice' )";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header ("Refresh: 2;URL='adminpage.php'");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

    </body>
</html>
