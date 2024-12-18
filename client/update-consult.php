<!DOCTYPE html>
<html lang="en">

<?php
include('../dbcon.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<head>
    <?php
    include('../headsidecss.php');
    ?>

    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <title>Client Record</title>
    <link rel="icon" href="../../img/305927332_511221787681066_7524329288728077651_n.jpg">

    <style>
        .form-control:focus {
            border-color: #007bff;
            /* Change to the desired highlight color */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            /* Optional box shadow effect */
            outline: none;
            /* Remove the default focus outline if needed */
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
                        <center><img src="../../img/305927332_511221787681066_7524329288728077651_n.jpg" style="height: 40%; width: 40%;" alt="logo"></center>
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
                                        <p>Immunization Services</p>
                                    </a>
                                </li>
                              <li class="nav-item">
                                  <a href="../deworming1/deworming.php" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Deworming Services</p>
                                  </a>
                              </li>
                                <li class="nav-item">
                                    <a href="../nutrition2/nutrition2.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nutrition Program</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../sickchildren/sickchildren.php" class="nav-link active">
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
                            <li class="nav-item">
                                <a href="../client/general-consult.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>General Consultation</p>
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
                                            <p>Custom Report</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../main/client.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Follow-up Health Service</p>
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
                                <h4 class="font-weight-bold" style="font-family: Helvetica;">SICK CHILDREN</h4>
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

                                                    <h5 class="font-weight-bold">Update record</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">

                                            <?php
                                            $id = $_GET['id'];
                                            $edit = mysqli_query($con, "SELECT * FROM consultation INNER JOIN client ON consultation.patientid = client.id
                                            WHERE consult_id = $id;");
                                            $row = mysqli_fetch_assoc($edit); ?>

                                            <div>
                                                <input name="consult_id" type="hidden"
                                                value="<?php echo $row['consult_id']; ?>">
                                            </div>
                                            

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Client ID:</label>
                                                    <input name="patientid" class="form-control form-control-sm"
                                                        type="number" value="<?php echo $row['patientid']; ?>" readonly>
                                                </div>
                                            </div>
                                            <?php
                                            $cdate = $row['date'];
                                            $readonly1 = ($cdate === '0000-00-00') ? '' : 'readonly';
                                            ?>
                                               
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Date:</label>
                                                    <input name="date" class="form-control form-control-sm"
                                                        type="date" value="<?php echo $cdate; ?>" <?php echo $readonly1; ?>>
                                                </div>
                                            </div>

                                            <?php
                                            $weight = $row['weight'];
                                            $height = $row['height'];
                                            $readonly2 = ($weight === '0') ? '' : 'readonly';
                                            $readonly3 = ($height === '0') ? '' : 'readonly';
                                            ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Weight (kg):</label>
                                                    <input name="weight" class="form-control form-control-sm"
                                                        type="number" min="0" value="<?php echo $weight; ?>" <?php echo $readonly2; ?>>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Height (cm):</label>
                                                    <input name="height" class="form-control form-control-sm"
                                                        type="number" min="0" value="<?php echo $height; ?>" <?php echo $readonly3; ?>>
                                                </div>
                                            </div>

                                            <?php
                                            $diag = $row['diagnosis'];
                                            $treat = $row['treatment'];
                                            $readonly5 = ($diag === '') ? '' : 'readonly';
                                            $readonly6 = ($treat === '') ? '' : 'readonly';
                                            ?>

                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Diagnosis:</label>
                                                <textarea name="diagnosis" class="form-control form-control-sm" 
                                                rows="2" <?php echo $readonly5; ?>><?php echo $diag; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Treatment:</label>
                                                <textarea name="treatment" class="form-control form-control-sm" 
                                                rows="2"<?php echo $readonly6; ?>><?php echo $treat; ?></textarea>
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
                                            <a href="sickchildren-record.php?id=<?php echo $row['patientid']; ?>">
                                                <button type="button" class="btn btn-default">Cancel</button>
                                            </a>
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        </div>

                                </form>

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

        <?php
        if (isset($_POST['update'])) {

            $id = $_GET['id'];
            $consult_id = $_POST['consult_id'];
            $patientid = $_POST['patientid'];
            $date = $_POST['date'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $diagnosis = $_POST['diagnosis'];
            $treatment = $_POST['treatment'];
            $remarks = $_POST['remarks'];
            $remarks = mysqli_real_escape_string($con, $remarks);

            mysqli_query($con, "UPDATE consultation SET patientid='$patientid', date='$date', 
            weight='$weight', height='$height', diagnosis='$diagnosis', treatment='$treatment', remarks='$remarks' 
            WHERE consult_id = '$id'"); ?>

            <script type="text/javascript">
                window.location = "sickchildren-record.php?id=<?php echo $row['patientid']; ?>";
            </script>

            <?php
        }
        ?>



        <script>
            $(document).ready(function () {
                $('#todoCheck3').on('change', function () {
                    if ($(this).is(':checked')) {
                        $('#todoCheck4').prop('checked', false);
                    }
                });

                $('#todoCheck4').on('change', function () {
                    if ($(this).is(':checked')) {
                        $('#todoCheck3').prop('checked', false);
                    }
                });
            });

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

        </script>


    <?php } elseif ($_SESSION['type'] == "Nurse") {
            header("Location: ../../index.php");
        } ?>


</body>

</html>