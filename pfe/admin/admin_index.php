<?php
session_start();
if (isset($_SESSION['username']) == false || $_SESSION["role"] != "a") {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../login_page.php');
}
?>
<!doctype html>
<html lang="en">

<head>

  <title>Administrator Space</title>
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
                <a style="color:'orange'">welcome <?php echo $_SESSION['name'] ?> , </a><a href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>






    </div>
  </div>



  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>