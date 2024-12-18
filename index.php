<!DOCTYPE html>
<html>

<?php
include('pages/dbcon.php');
ob_start();
session_start();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Health Record Management</title>
  <link rel="icon" href="img/logo.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    .card-header {
      padding: 0rem;
    }
  </style>
</head>

<body class="hold-transition login-page" style="background-image: url('img/loyal.jpg'); background-size: cover;">

  <!-- TCL-MIS -->
  <div class="login-box" style="font-family: Helvetica; width:40%">


      <!-- Login -->
        <div class="card card-dark card-tabs">
          <div class="card-header">
            <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">  
              <li class="nav-item">
                <a class="nav-link active font-weight-bold" id="pills-bhw-tab" data-toggle="pill" href="#pills-bhw"
                  role="tab" aria-controls="pills-bhw" aria-selected="false">BHW</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-weight-bold" id="pills-nurse-tab" data-toggle="pill" href="#pills-nurse" role="tab"
                  aria-controls="pills-nurse" aria-selected="false">NURSE</a>
              </li>
            </ul>
          </div>

          <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-bhw" role="tabpanel" aria-labelledby="pills-bhw-tab">

              <!-- BHW Login -->
                <form method="post">
                  <img src="img/305927332_511221787681066_7524329288728077651_n.jpg" style="height: 35%; width: 35%;" class="login-box-msg rounded mx-auto d-block"
                    alt="305927332_511221787681066_7524329288728077651_n.jpg">
                  <h5 class="text-center font-weight-bold">HEALTH RECORD MANAGEMENT<br><hr></h5>
                  <p class="text-center font-weight-bold">Barangay Health Worker</p>

                  
                  <div class="input-group mb-3">
                    <input type="text" class="form-control text-center" name="username" required autofocus
                      placeholder="Enter username" autocomplete="off">
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control text-center" name="password" required autofocus
                      placeholder="Enter password">
                  </div>
                  <div>
                    <button type="submit" class="btn btn-block btn-dark text-white font-weight-bold" name="login1">LOG
                      IN</button>
                  </div>
                  <?php
                  if (isset($_REQUEST['login1'])) {
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    $bhw = mysqli_query($con, "SELECT * from users where username = '$username' and password = '$password'
                    and type = 'bhw'");
                    $numrow_bhw = mysqli_num_rows($bhw);

                    if ($numrow_bhw > 0) {
                      while ($id = mysqli_fetch_array($bhw)) {
                        $_SESSION['type'] = "Barangay Health Worker";
                        $_SESSION['uid'] = $id['user_id'];
                      }
                      header("location: pages/main/dashboard.php");
                      ob_end_flush();
                      exit();

                    } else { ?>
                      <script type="text/javascript">
                        alert("You have entered incorrect username or password.");
                        window.location = "index.php";
                      </script>
                      <?php
                    }
                  }
                  ?>
                </form>
              </div>

              <!-- Nurse Login -->
              <div class="tab-pane fade" id="pills-nurse" role="tabpanel" aria-labelledby="pills-nurse-tab">
                <form method="post">
                  <img src="img/305927332_511221787681066_7524329288728077651_n.jpg" style="height: 35%; width: 35%;" class="login-box-msg rounded mx-auto d-block"
                    alt="305927332_511221787681066_7524329288728077651_n.jpg">
                  <h5 class="text-center font-weight-bold">HEALTH RECORD MANAGEMENT<br><hr></h5>
                  <p class="text-center font-weight-bold">Barangay Nurse</p>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control text-center" name="username" required autofocus
                      placeholder="Enter username" autocomplete="off">
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control text-center" name="password" required autofocus
                      placeholder="Enter password">
                  </div>
                  <div>
                    <button type="submit" class="btn btn-block btn-dark text-white font-weight-bold" name="login2">LOG
                      IN</button>
                  </div>
                  <?php
                  if (isset($_REQUEST['login2'])) {
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    $nurse = mysqli_query($con, "SELECT * from users where username = '$username' and password = '$password'
                    and type = 'nurse'");
                    $numrow_nurse = mysqli_num_rows($nurse);

                    if ($numrow_nurse > 0) {
                      while ($id = mysqli_fetch_array($nurse)) {
                        $_SESSION['type'] = "Nurse";
                        $_SESSION['uid'] = $id['user_id'];
                      }
                      header("location: pages/main/dashboard.php");
                      ob_end_flush();
                      exit();

                    } else { ?>
                      <script type="text/javascript">
                        alert("You have entered incorrect username or password.");
                        window.location = "index.php";
                      </script>
                      <?php
                    }
                  }
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>


</body>

</html>