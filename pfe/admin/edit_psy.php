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


    $id_psy = $_POST['id_psy'];



    $query = "SELECT * FROM psy WHERE id='$id_psy' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
            <div class="container">
                <div class="jumbotron">
                    <h2> EDIT DR.<?php echo $row['name']; ?>'s ACCOUNT </h2>
                    <hr>
                    <form action="" method="POST">
                        <input type="hidden" name="id_psy" value="<?php echo $row['id']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input placeholder="Full Name" value="<?php echo $row['name']; ?>" type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Adress</label>
                                <input placeholder="Adress" value="<?php echo $row['adress']; ?>" type="text" name="adress" id="adress" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input placeholder="Phone Number" value="<?php echo $row['phone']; ?>" type="text" name="phone" id="phone" maxlength="8" pattern="[0-9]{8}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input placeholder="Email" value="<?php echo $row['email']; ?>" type="text" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="admin_psy.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="editbtn" class="btn btn-success">Update!</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['editbtn'])) {
                        $name = $_POST['name'];
                        $adress = $_POST['adress'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];

                        $query = "UPDATE psy SET name='$name', adress='$adress', phone='$phone', email='$email' WHERE id='$id_psy' ";
                        $query_run = mysqli_query($conn, $query);

                        if ($query_run) {
                            header('location: admin_psy.php');
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
        echo '<script> alert("No Psy Found!"); </script>';
    }



    ?>




</body>

</html>