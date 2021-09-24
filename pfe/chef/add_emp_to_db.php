<?php
session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "c") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
    include_once 'connect_to_db.php';
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $name = $_POST['name'];
    $emp = 'e';
    
$sql = "INSERT INTO account_details (id, password, name, email, phone, department, role) VALUES ('$id','$password','$name','$email','$phone','$department','$emp')";

mysqli_query($conn,$sql);
header("Location: chef_emp.php")
?>