<?php
session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "c") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
require_once 'connect_to_db.php';
$result = mysqli_query($conn, "SELECT * FROM account_details WHERE role = 'e'");
$rows = mysqli_num_rows($result);
$n = 5;
?>


<!doctype html>
<html lang="en">

<head>

  <title>Chef Engineer Space</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">

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
        <a href="chef_index.php" class="img logo rounded-circle mb-5" style="background-image: url(img/Hnet.com-image.gif);"></a>
        <ul class="list-unstyled components mb-5">

          <li>
            <a href="chef_emp.php">Manage Engineers</a>
          </li>

          </li>
          <li>
            <a href="chef_tasks.php">Add Tasks</a>
          </li>

          <li>
            <a href="chef_report.php">Reports Space</a>
          </li>

          <li>
            <a href="chat.php">CHAT SPACE</a>
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
                <a href="chef_index.php" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0" style="color:orange">Main Menu</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chef Engineer's Report Space</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
          body {
            color: #566787;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
          }

          .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
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
            padding: 15px 50px;
            vertical-align: middle;
          }

          table.table tr th:first-child {
            width: 500px;
          }

          table.table tr th:last-child {
            width: 100px;
            padding: 15px 70px;
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

          .search-id {
            float: right;
            margin-top: 10px;
            font-size: 14px;
          }

          /* Custom checkbox */
          .custom-checkbox {
            position: relative;
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
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
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

          .valuePadding {
            border: 2px inset #ccc;
          }

          .valuePadding input {
            border: none;
            padding: 0px;
            outline: none;
          }
        </style>


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
            <div class="table-title">
              <div class="row">
                <div class="col-sm-6">
                  <h2 style="color:orange">Engineer <b style="color:orange">TASK SUBMIT</b></h2>

                </div>
                <input class="search-id" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID.." title="Type in a name">

              </div>
            </div>
            <form action="" method="POST">
              <table id="myTable" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ACTION</th>
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

                  <?php
                  $role = $row["role"];
                  ?>




                  <td><?php echo $row["id"]; ?></td>
                  <td><?php echo $row["name"]; ?></td>





                  <td>
                    <form action="submit_task.php" method="POST">
                      <input type="hidden" name="id_eng" value="<?php echo $row["id"]; ?>">
                      <input type="hidden" name="name_eng" value="<?php echo $row["name"]; ?>">
                      <input type="hidden" name="id_chef" value="<?php echo $_SESSION['username'] ?>">
                      <input type="submit" name="submit_bouton" class="btn btn-info btn-xs" value="ADD TASK">
                    </form>
                  </td>
              </tr>
            <?php
                  $i++;
                }
            ?>


            </tbody>
            </table>

            <script>
              function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[0];
                  if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }
                }
              }
            </script>

            <div class="clearfix">
              <div class="hint-text">Showing <b><?php echo $rows; ?></b> out of <b><?php echo $rows ?></b>Engineers</div>
            </div>
          </div>
        </div>

        <script>
          $(document).ready(function() {
            $("#myTable").dataTable();
          });
        </script>



    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>