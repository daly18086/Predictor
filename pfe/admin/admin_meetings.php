<?php session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "a") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
require_once 'connect_to_db.php';
$result = mysqli_query($conn, "SELECT * FROM meetings ORDER BY date");
$rows = mysqli_num_rows($result);

?>


<!doctype html>
<html lang="en">

<head>

  <title>Administrator's Space</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="stylesheet" href="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"> </script>


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



  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="admin_index.php" class="img logo rounded-circle mb-5" style="background-image: url(img/Hnet.com-image.gif);"></a>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a style="color:orange" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Management Space</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
              <li>
                <a href="admin_all_emp.php">Manage All Engineers</a>
              </li>
              <li>
                <a href="admin_chef.php">Manage Chef Engineers</a>
              </li>
              <li>
                <a href="admin_emp.php">Manage Engineers</a>
              </li>
              <li>
                <a href="admin_meetings.php">Manage Meetings</a>
              </li>
              <li>
                <a href="admin_psy.php">Manage psychologists</a>
              </li>
            </ul>
          </li>

          <li class="active">
            <a style="color:orange" href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Consulting Yields Space</a>
            <ul class="collapse list-unstyled" id="menu">
              <li>
                <a href="admin_tr1states.php">Consult 1st Trimester States</a>
              </li>
              <li>
                <a href="admin_tr2states.php">Consult 2nd Trimester States</a>
              </li>
              <li>
                <a href="admin_tr3states.php">Consult 3rd Trimester States</a>
              </li>
              <li>
                <a href="admin_yield.php">Consult Year's states</a>
              </li>
            </ul>
          </li>
          <li>
            <a style="color:orange" href="chat.php">Chat Area</a>
          </li>
        </ul>

        <div class="footer">
          <p>
            If you have any questions, please visit the main office of the company.
            Thank you!
          </p>
        </div>

      </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <a href="admin_index.php" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0" style="color:orange">Main Menu</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator Space</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
          body {
            color: black;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
          }

          .table-wrapper {
            background: white;
            width: 70%;
            border-radius: 1px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
          }

          .table-title {
            padding-bottom: 15px;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 1px 1px 0 0;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
          }

          .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
          }

          .table-title .btn-group {
            float: right;
          }

          .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 1px;
            border: none;
            outline: none !important;
            margin-left: 10px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
          }

          .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
          }

          .table-title .btn span {
            float: left;
            margin-top: 2px;
          }

          table.table tr th,
          table.table tr td {
            border-color: #e9e9e9;
            padding: 14px 25px;
            vertical-align: middle;
          }

          table.table tr th:first-child {
            width: 333px;
          }

          table.table tr th:last-child {
            width: 900px;
          }

          table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
          }

          table.table-striped.table-hover tbody tr:hover {
            background: #dad6d6;
          }

          table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
          }

          table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
          }

          table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
          }

          table.table td a:hover {
            color: #2196F3;
          }

          table.table td a.edit {
            color: #FFC107;
          }

          table.table td a.delete {
            color: #F44336;
          }

          table.table td i {
            font-size: 19px;
          }

          table.table .avatar {
            border-radius: 1px;
            vertical-align: middle;
            margin-right: 10px;
          }

          .pagination {
            float: right;
            margin: 0 0 5px;
          }

          .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 1px !important;
            text-align: center;
            padding: 0 6px;
          }

          .pagination li a:hover {
            color: #666;
          }

          .pagination li.active a,
          .pagination li.active a.page-link {
            background: #03A9F4;
          }

          .pagination li.active a:hover {
            background: #0397d6;
          }

          .pagination li.disabled i {
            color: #ccc;
          }

          .pagination li i {
            font-size: 16px;
            padding-top: 6px
          }

          .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
          }

          /* Custom checkbox */
          .custom-checkbox {
            position: absolute;
          }

          .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
          }

          .custom-checkbox label:before {
            width: 18px;
            height: 18px;
          }


          .custom-checkbox label:before {
            content: '';
            margin-right: 0px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1.5px solid #bbb;
            border-radius: 1px;
            box-sizing: border-box;
            z-index: 2;
          }

          .DOUDA {
            content: '';
            margin-right: 0px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1.5px solid #bbb;
            border-radius: 1px;
            box-sizing: border-box;
            z-index: 2;
          }

          .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
          }

          .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
          }

          .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
          }

          .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
          }

          /* Modal styles */
          .modal .modal-dialog {
            max-width: 400px;
          }

          .modal .modal-header,
          .modal .modal-body,
          .modal .modal-footer {
            padding: 20px 30px;
          }

          .modal .modal-content {
            border-radius: 1px;
          }

          .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 1px 1px;
          }

          .modal .modal-title {
            display: inline-block;
          }

          .modal .form-control {
            border-radius: 1px;
            box-shadow: none;
            border-color: #dddddd;
          }

          .modal textarea.form-control {
            resize: vertical;
          }

          .modal .btn {
            border-radius: 1px;
            min-width: 100px;
          }

          .modal form label {
            font-weight: normal;
          }

          .move_right {
            position: fixed;
            right: 0;
            top: 47%;
            width: 26em;
            margin-top: -10em;
          }
        </style>

        <script type="text/javascript">
          $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
              if (this.checked) {
                checkbox.each(function() {
                  this.checked = true;
                });
              } else {
                checkbox.each(function() {
                  this.checked = false;
                });
              }
            });
            checkbox.click(function() {
              if (!this.checked) {
                $("#selectAll").prop("checked", false);
              }
            });
          });
        </script>

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
        <div class="container">
          <div class="table-wrapper">
            <div style="position:absolute; left:950px; top:170px;">
              <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add A Meeting</span></a>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <h2 style="color:orange;">Manage <b style="color:orange">Meetings</b>
                </h2>
              </div>

            </div>

            <form action="delete_multiple_meetings.php" method="POST">
              <table id="myTable" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>


                      <span>
                        <button type="submit" name="delete_cb" class="btn btn-danger btn-xs">Delete</button>
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                      </span>

                    </th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Actions</th>
                  </tr>
                </thead>
            </form>
            <tbody>
              <tr>


                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                  if ($i % 2 == 0)
                    $classname = "even";
                  else
                    $classname = "odd";
                ?>



                  <td>
                    <span class="custom-checkbox">
                      <input type="checkbox" id="checkbox1" name="id_cb[]" value="<?= $row['id']; ?>">
                      <label for="checkbox1"></label>
                    </span>
                  </td>



                  <td><?php echo $row["title"]; ?></td>
                  <td><?php echo $row["date"]; ?></td>
                  <td><?php echo $row["location"]; ?></td>
                  <td><?php echo $row["phone"]; ?></td>
                  <td><?php echo $row["type"]; ?></td>
                  <td>
                    <form action="edit_meeting.php" method="POST">
                      <input type="hidden" name="id_meeting" value="<?php echo $row['id']; ?>">
                      <input type="submit" name="edit_bouton" class="btn btn-info btn-xs" value="EDIT">
                    </form>
                    <form action="admin_meeting_delete.php" method="POST">
                      <input type="hidden" name="id_meeting" value="<?php echo $row['id']; ?>">
                      <input type="submit" name="delete_bouton" class="btn btn-danger btn-xs" value="DELETE">
                    </form>
                  </td>
              </tr>
            <?php
                  $i++;
                }
            ?>


            </tbody>
            </table>








          </div>
        </div>

        <!-- Add Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="add_meeting_to_db.php" method="POST">
                <div class="modal-header">
                  <h4 class="modal-title" style="color:orange">Add Engineer</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Title</label>
                    <input placeholder="Title" type="text" name="title" id="title" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input placeholder="Meeting's Date" type="date" name="date" id="date" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Location</label>
                    <input placeholder="Meeting's Location" type="text" name="location" id="location" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Organiser's Phone</label>
                    <input placeholder="Phone Number" type="text" name="phone" id="phone" maxlength="8" pattern="[0-9]{8}" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Type (seminar OR course)</label>
                    <input placeholder="Meeting's Type" maxlength="7" type="text" name="type" id="type" class="form-control" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <button type="submit" name="submit" class="btn btn-success">Add Meeting</button>
                </div>
              </form>
            </div>
          </div>
        </div>



    </div>
  </div>

  </div>



  </div>









  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".table").DataTable({
        "ordering": true,
        "searching": true,
        "paging": true,
        "columnDefs": [{
          "targets": 0,
          "searchable": true,
          "visible": true
        }],
        "order": [
          [2, "desc"]
        ]
      });
    });
  </script>







</body>
</body>


</html>