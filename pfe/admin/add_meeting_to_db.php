<?php
    include_once 'connect_to_db.php';
    $title = $_POST['title'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    
$sql = "INSERT INTO meetings (title,date,location,phone,type) VALUES ('$title','$date','$location','$phone','$type')";

mysqli_query($conn,$sql);
header("Location: admin_meetings.php")
?>