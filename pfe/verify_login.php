<?php
session_start();
include("connect_to_db.php");

if (isset($_POST['login'])) {

    $id = $_POST['id'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, " SELECT * FROM account_details WHERE id = '$id' AND password = '$password' ");
    $row  = mysqli_fetch_array($select);


    if (is_array($row) && $row["role"] == 'a') {
        $_SESSION["role"] = $row['role'];
        $_SESSION["username"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        header("location: admin/admin_index.php");


    } else if (is_array($row) && $row["role"] == 'c') {
        $_SESSION["role"] = $row['role'];
        $_SESSION["username"] = $id;
        $_SESSION["name"] = $row['name'];
        header("location: chef/chef_index.php");


    } else if (is_array($row) && $row["role"] == 'e') {
        $_SESSION["role"] = $row['role'];
        $_SESSION["username"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        header("location: emp/emp_index.php");


    } else {
        echo '<script type = "text/javascript">';
        echo 'alert("Sorry, This user is not part of the 3s company!");';
        echo 'window.location.href = "login_page.php" ';
        echo '</script>';
    }
}
?>
