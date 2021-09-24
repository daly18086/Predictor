<?php  session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "a") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}


require_once "connect_to_db.php";

if(isset($_POST['delete_bouton']))
{
    $id_meeting = $_POST['id_meeting'];
    


    $query = "DELETE FROM meetings WHERE id='$id_meeting' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location: admin_meetings.php");
    } else {
        header("location: admin_meetings.php");
    }
}


?>