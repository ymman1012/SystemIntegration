<!DOCTYPE html>
<html lang="en">

<?php
include('../dbcon.php');

session_start();
if (!isset($_SESSION['type'])) {
    header("Location: ../../index.php");
} else {
    ob_start();
    ?>

    <head>
        <?php
        include('../headsidecss.php');
        ?>

        <!-- DataTables -->
        <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

        <title>Deworming 5-9 years old</title>
        <link rel="icon" href="../../img/logo.png">

        <style>
        .form-control:focus {
            border-color: #007bff; /* Change to the desired highlight color */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Optional box shadow effect */
            outline: none; /* Remove the default focus outline if needed */
        }
        </style>
    </head>

    <body class="hold-transition sidebar-mini">

        <div class="wrapper">
            <?php
            include('../sidebar.php');
            ?>


            <?php
            if ($_SESSION['type'] == "Barangay Health Worker") {
                ?>

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
                    <h1 class="brand-link text-center">
                        <span class="brand-text font-weight-bold" style="font-family: Helvetica; font-size: 17px;">
                            Health Record Management
                        </span>
                    </h1>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar panel -->
                        <div class="user-panel pb-3 mb-3">
                            <center><img src="../../img/logo.png" style="height: 40%; width: 40%;" alt="logo"></center>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2" style="font-family: Helvetica;">
                            <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu"
                                data-accordion="false">
                        <li class="nav-item">
                            <a href="../main/dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../client/client-list.php" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Client
                                </p>
                            </a>
                        </li>
                                <li class="nav-item has-treeview menu-open">
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-notes-medical"></i>
                                        <p>
                                            Health Services
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="../immunization/immunization.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Immunization (0-12 mos. old)</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../deworming1/deworming1-4.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Deworming (1-4 years old)</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../deworming2/deworming5-9.php" class="nav-link active">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Deworming (5-9 years old)</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../deworming3/deworming10-19.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Deworming (10-19 years old)</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../nutrition1/nutrition1.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Nutrition and EPI Program I</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../nutrition2/nutrition2.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Nutrition and EPI Program II</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../sickchildren/sickchildren.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Sick Children</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../maternal/maternal.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Maternal Care</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../postpartum/postpartum.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Postpartum Care</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            Report
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="../main/report.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Generate Report</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="../main/client.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Client Report</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>


                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="font-weight-bold" style="font-family: Helvetica;">TARGET CLIENT LIST</h4>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <section class="content text-sm" style="font-family: Helvetica;">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="card">

                                    <form method="post">
                                        <div class="card-body d-flex flex-column">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-5">

                                                        <h5 class="font-weight-bold">Update client record</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">

                                                <?php
                                                $did2 = $_GET['did2'];
                                                $edit = mysqli_query($con, "SELECT * FROM deworming WHERE deworming_id = '$did2'");
                                                $row = mysqli_fetch_assoc($edit); ?>


                                                <div>
                                                    <input type="hidden" name="deworming_id"
                                                        value="<?php echo $row['deworming_id']; ?>">
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input name="service" class="form-control form-control-sm text-center"
                                                            type="hidden" value="<?php echo $row['service']; ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Date of Registration:</label>
                                                        <input name="reg_date" class="form-control form-control-sm" type="date"
                                                            value="<?php echo $row['reg_date']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Date of Birth:</label>
                                                        <input name="birth_date" class="form-control form-control-sm"
                                                            type="date" value="<?php echo $row['birth_date']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Name of Child:</label>
                                                        <input name="fname" type="text" class="form-control form-control-sm"
                                                            value="<?php echo $row['fname']; ?>" oninput="validateInput(this)">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label><br></label>
                                                        <input name="minitial" type="text" class="form-control form-control-sm"
                                                            value="<?php echo $row['minitial']; ?>"
                                                            oninput="validateInput(this)">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label><br></label>
                                                        <input name="lname" type="text" class="form-control form-control-sm"
                                                            value="<?php echo $row['lname']; ?>" oninput="validateInput(this)">
                                                    </div>
                                                </div>
                                                
                                                
                            <div class="col-md-6">
                                    <label>Sex: </label>
                                    <div class="form-group">
                                        <div class="icheck-primary">
                                            <input type="radio" name="sex" value="M" id="radioPrimary1"
                                            <?php if ($row['sex'] == "M") echo 'checked'; ?>>
                                            <label for="radioPrimary1">
                                                <span class="text" style="font-weight: normal;">
                                                    Male
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label><br></label>
                                    <div class="form-group">
                                        <div class="icheck-primary">
                                            <input type="radio" name="sex" value="F" id="radioPrimary2"
                                            <?php if ($row['sex'] == "F") echo 'checked'; ?>>
                                            <label for="radioPrimary2">
                                                <span class="text" style="font-weight: normal;">
                                                    Female
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                                <!--
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Sex:<br></label>
                                                        <select name="sex" class="form-control form-control-sm"
                                                            style="width: 100%;">
                                                            <option selected>
                                                                <?php echo $row['sex']; ?>
                                                            </option>
                                                            <option value="M">M</option>
                                                            <option value="F">F</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            -->


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Complete Name of Mother:</label>
                                                        <input name="mother_name" class="form-control form-control-sm"
                                                            type="text" value="<?php echo $row['mother_name']; ?>"
                                                            oninput="validateInput(this)">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputaddress">Complete Address:<br></label>
                                                        <select name="purok" class="form-control form-control-sm"
                                                            id="inputaddress" style="width: 100%">
                                                            <option selected>
                                                                <?php echo $row['purok']; ?>
                                                            </option>
                                                            <option value="Purok 93">Purok 93</option>
                                                            <option value="Purok 94">Purok 94</option>
                                                            <option value="Purok 95">Purok 95</option>
                                                            <option value="Purok 96">Purok 96</option>
                                                            <option value="Purok 97">Purok 97</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><br></label>
                                                        <input name="address" class="form-control form-control-sm" type="text"
                                                            value="<?php echo $row['address']; ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Age:<br></label>
                                                        <select name="age" class="form-control form-control-sm"
                                                            style="width: 100%;" required>
                                                            <option selected>
                                                                <?php echo $row['age']; ?>
                                                            </option>
                                                            <option value="5 y/o">5 y/o</option>
                                                            <option value="6 y/o">6 y/o</option>
                                                            <option value="7 y/o">7 y/o</option>
                                                            <option value="8 y/o">8 y/o</option>
                                                            <option value="9 y/o">9 y/o</option>
                                                        </select>
                                                    </div>
                                                </div>

                                        <div class="col-md-6">
                                            <label>Date Given</label>
                                                <div class="form-group">
                                                    <label>1st Dose:</label>
                                                        <input name="1stdose" class="form-control form-control-sm" type="date"
                                                            value="<?php echo $row['1stdose']; ?>">
                                                    </div>
                                                </div>

                                        <div class="col-md-6">
                                            <label><br></label>
                                                <div class="form-group">
                                                    <label>2nd Dose:</label>
                                                        <input name="2nddose" class="form-control form-control-sm" type="date"
                                                            value="<?php echo $row['2nddose']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Remarks</label>
                                                        <textarea name="remarks" class="form-control form-control-sm"
                                                            rows="2"><?php echo $row['remarks']; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <a href="../deworming2/deworming5-9.php">
                                                    <button type="button" class="btn btn-default">Cancel</button>
                                                </a>
                                                <button type="submit" name="update" class="btn btn-primary">Update
                                                    client</button>
                                            </div>

                                    </form>

                                    <?php

                                    if (isset($_REQUEST['update'])) {
                                        $service = $_POST['service'];
                                        $reg_date = $_POST['reg_date'];
                                        $birth_date = $_POST['birth_date'];
                                        $fname = $_POST['fname'];
                                        $minitial = $_POST['minitial'];
                                        $lname = $_POST['lname'];
                                        $sex = $_POST['sex'];
                                        $mother_name = $_POST['mother_name'];
                                        $purok = $_POST['purok'];
                                        $address = $_POST['address'];
                                        $age = $_POST['age'];
                                        $first = $_POST['1stdose'];
                                        $second = $_POST['2nddose'];
                                        $remarks = $_POST['remarks'];
                                        $remarks = mysqli_real_escape_string($con, $remarks);
                                        $did2 = $_GET['did2'];

                                        mysqli_query($con, "UPDATE deworming SET service='$service', reg_date='$reg_date', birth_date='$birth_date', fname='$fname', 
  minitial='$minitial', lname='$lname', sex='$sex', mother_name='$mother_name', purok='$purok', address='$address',
  age='$age', 1stdose='$first', 2nddose='$second', remarks='$remarks' WHERE deworming_id = '$did2'"); ?>

                                        <script type="text/javascript">
                                            alert("A client record has been updated.");
                                            window.location = "../deworming2/deworming5-9.php";
                                        </script>

                                        <?php
                                    }
                                    ?>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="col-3"></div>

                        </div>
                </div>
                </section>
            </div>

            </div>
            <!-- ./wrapper -->

            <script>
                function validateInput(inputElement) {
                    let inputValue = inputElement.value;
                    let lettersOnly = inputValue.replace(/[^a-zA-Z\s.]/g, '');

                    if (inputValue !== lettersOnly) {
                        let selectionStart = inputElement.selectionStart;
                        let selectionEnd = inputElement.selectionEnd;

                        inputElement.value = lettersOnly;

                        // Restore cursor position
                        inputElement.setSelectionRange(selectionStart, selectionEnd);
                    }
                }
                
                // disable date
                const datePickers = document.querySelectorAll(".date-picker");

                    datePickers.forEach(function(datePicker) {
                        if (datePicker.value) {
                        datePicker.disabled = true;
                    }
                });
            </script>


        <?php } elseif ($_SESSION['type'] == "Nurse") {
                header("Location: ../../index.php");
            } ?>

        <!-- DataTables -->
        <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


        <?php
}
?>

</body>

</html>