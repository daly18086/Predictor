<?php
session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "c") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
    include_once 'connect_to_db.php';
    $id = $_POST['mat'];
    $name = $_POST['name'];
    $progress = $_POST['progress'];

    
$sql = "INSERT INTO daily_reports (id,name,progress) VALUES ('$id','$name','$progress')";

mysqli_query($conn,$sql);
header("Location: chef_report.php")
?>