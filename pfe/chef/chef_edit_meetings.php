<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Edit Meeting</title>
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
    <?php
    session_start();
    if (isset($_SESSION['username']) == false || $_SESSION["role"] != "c") {
      $_SESSION['msg'] = "You have to log in first";
      header('location: ../login_page.php');
    }
    require_once "connect_to_db.php";


    $id = $_POST['id_meeting'];



    $query = "SELECT * FROM meetings WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
            <div class="container">
                <div class="jumbotron">
                    <h2> EDIT MEETING </h2>
                    <hr>
                    <form action="" method="POST">
                        <input type="hidden" name="id_meeting" value="<?php echo $row['id']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input placeholder="Title" value="<?php echo $row['title']; ?>" type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input placeholder="Meeting's Date" value="<?php echo $row['date']; ?>" type="date" name="date" id="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input placeholder="Meeting's Date" value="<?php echo $row['location']; ?>" type="text" name="location" id="location" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Organiser's Phone</label>
                                <input placeholder="Phone Number" value="<?php echo $row['phone']; ?>" type="text" name="phone" id="phone" maxlength="8" pattern="[0-9]{8}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Type (seminar OR course)</label>
                                <input placeholder="Meeting's Type" value="<?php echo $row['type']; ?>" maxlength="7" type="text" name="type" id="type" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="chef_meetings.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="editbtn" class="btn btn-success">EDIT!</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['editbtn'])) {
                        $title = $_POST['title'];
                        $date = $_POST['date'];
                        $location = $_POST['location'];
                        $phone = $_POST['phone'];
                        $type = $_POST['type'];

                        $query = "UPDATE meetings SET title='$title', date='$date', location='$location', phone='$phone', type='$type' WHERE id='$id'";
                        $query_run = mysqli_query($conn, $query);

                        if ($query_run) {
                            header('location: chef_meetings.php');
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
        echo '<script> alert("No Employees Found!"); </script>';
    }



    ?>




</body>

</html>