<?php
session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "c") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
    include_once 'connect_to_db.php';
    $title = $_POST['title'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    
$sql = "INSERT INTO meetings (title,date,location,phone,type) VALUES ('$title','$date','$location','$phone','$type')";

mysqli_query($conn,$sql);
header("Location: chef_meetings.php")
?>