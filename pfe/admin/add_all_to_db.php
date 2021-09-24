<?php
    include_once 'connect_to_db.php';
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $name = $_POST['name'];
    $hiredate = $_POST['hiredate'];
    $role=$_POST['role'];
    
$sql = "INSERT INTO account_details (id, password, name, email, phone, department,hiredate, role) VALUES ('$id','$password','$name','$email','$phone','$department','$hiredate','$role')";

mysqli_query($conn,$sql);
header("Location: admin_all_emp.php")
?>