<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            background-image: url('img/input-bg-06.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
    <?php session_start();
    if (isset($_SESSION['username']) == false || $_SESSION["role"] != "a") {
        $_SESSION['msg'] = "You have to log in first";
        header('location: ../login_page.php');
    }
    require_once "connect_to_db.php";


    $mat = $_POST['mat'];



    $query = "SELECT * FROM account_details WHERE matricule='$mat' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
            <div class="container">
                <div class="jumbotron">
                    <h2> EDIT <?php echo $row['name']; ?>'s ACCOUNT </h2>
                    <hr>
                    <form action="" method="POST">
                        <input type="hidden" name="mat" value="<?php echo $row['matricule']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Id</label>
                                <input placeholder="Identifier" value="<?php echo $row['id']; ?>" type="text" name="id" maxlength="8" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input placeholder="Password" value="<?php echo $row['password']; ?>" type="text" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input placeholder="Full Name" type="text" value="<?php echo $row['name']; ?>" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>department</label>
                                <input placeholder="Department" type="text" value="<?php echo $row['department']; ?>" name="department" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input placeholder="Phone Number" value="<?php echo $row['phone']; ?>" type="text" maxlength="8" name="phone" pattern="[0-9]{8}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input placeholder="Email" value="<?php echo $row['email']; ?>" type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Hiring Date</label>
                                <input placeholder="Engineer's Hiring Date" value="<?php echo $row['hiredate']; ?>" type="date" name="hiredate" id="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>role (a:admin ; c:chef employee , e:Engineer)</label>
                                <input placeholder="Role" value="<?php echo $row['role']; ?>" maxlength="1" type="text" name="role" id="role" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="admin_emp.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="editbtn" class="btn btn-success">Update!</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['editbtn'])) {
                        $id = $_POST['id'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $department = $_POST['department'];
                        $name = $_POST['name'];
                        $hiredate = $_POST['hiredate'];
                        $role = $_POST['role'];

                        $query = "UPDATE account_details SET id='$id', phone='$phone', email='$email', password='$password', department='$department', name='$name', hiredate='$hiredate', role='$role' WHERE matricule='$mat'";
                        $query_run = mysqli_query($conn, $query);

                        if ($query_run) {
                            header('location: admin_emp.php');
                        } else {
                            echo ("ERROR!");
                        }
                    }

                    ?>

                </div>
            </div>


    <?php
        }
    } else {
        echo '<script> alert("No Engineers Found!"); </script>';
    }



    ?>




</body>

</html>