<?php session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "a") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}


require_once "connect_to_db.php";

if(isset($_POST['delete_bouton']))
{
    $mat = $_POST['mat'];
    


    $query = "DELETE FROM account_details WHERE matricule='$mat' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location: admin_emp.php");
    } else {
        echo ("ERROR!");
        header("location: admin_emp.php");
    }
}


?>