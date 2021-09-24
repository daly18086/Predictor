<?php
    include_once 'connect_to_db.php';
    $name = $_POST['name'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
$sql = "INSERT INTO psy (name,adress,phone,email) VALUES ('$name','$adress','$phone','$email')";

mysqli_query($conn,$sql);
header("Location: admin_psy.php")
?>