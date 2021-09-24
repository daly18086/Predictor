<?php
session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "c") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
    include_once 'connect_to_db.php';
    $name = $_POST['name'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
$sql = "INSERT INTO psy (name,adress,phone,email) VALUES ('$name','$adress','$phone','$email')";

mysqli_query($conn,$sql);
header("Location: chef_psy.php")
?>