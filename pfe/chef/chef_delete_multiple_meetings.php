<?php

session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "c") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
require_once "connect_to_db.php";

if(isset($_POST['delete_cb']))
{
    $id = $_POST['id_cb'];
    $extract_id = implode(',', $id);
    echo $extract_id;


    $query = "DELETE FROM meetings WHERE id IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location: chef_meetings.php");
    } else {
        header("location: chef_meetings.php");
        
    }
}


?>