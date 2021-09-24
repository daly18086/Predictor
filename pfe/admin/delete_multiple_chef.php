<?php session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "a") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}


require_once "connect_to_db.php";

if(isset($_POST['delete_cb']))
{if ($_POST['matricule_cb']==""){
    echo ("You have to select an engineer first!");
    header("location: admin_chef.php");
}
else{
    $all_mat = $_POST['matricule_cb'];
    $extract_mat = implode(',', $all_mat);
    echo $extract_mat;


    $query = "DELETE FROM account_details WHERE matricule IN($extract_mat) ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("location: admin_chef.php");
    } else {
        header("location: admin_chef.php");
    }
}
}


?>