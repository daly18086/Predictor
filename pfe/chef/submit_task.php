<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>ADD TASK</title>
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
    require_once 'connect_to_db.php';
    $id_chef = $_POST['id_chef'];
    $id_eng = $_POST['id_eng'];
    $name = $_POST['name_eng'];
    ?>
            <div class="container">
                <div class="jumbotron">
                    <h2> ADD TASK TO : <?php echo $name; ?> </h2>
                    <hr>
                    <form action="" method="POST">
                        <input type="hidden" name="mat" value="<?php echo $row['matricule']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Id</label>
                                <input placeholder="Identifier" value="<?php echo $id_eng;?>" type="text" name="id_eng" maxlength="8" class="form-control" required disabled>
                                <input value="<?php echo $id_eng;?>" type="hidden" name="id_engineer">
                                <input value="<?php echo $id_chef;?>" type="hidden" name="id_chef">
                            </div>
                            <div class="form-group">
                                <label>Task Title</label>
                                <input placeholder="Task's Title" value="" type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Task Description</label>
                                <input placeholder="Task's Description" type="text" value="" name="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Dead Line</label>
                                <input placeholder="Task's Dead Line" value="" type="date" name="deadline" id="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="chef_tasks.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="addbtn" class="btn btn-success">ADD TASK!</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['addbtn'])) {
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $deadline = $_POST['deadline'];
                        $id_chef = $_POST['id_chef'];
                        $id_engineer = $_POST['id_engineer'];

                        $query = "INSERT INTO tasks (id_engineer,title,description,deadline,added_by) VALUES ('$id_engineer','$title','$description','$deadline','$id_chef')";
                        $query_run = mysqli_query($conn, $query);

                        if ($query_run) {
                            header('location: chef_tasks.php');
                        } else {
                            echo ("ERROR!");
                        }
                    }

                    ?>

                </div>
            </div>





</body>

</html>