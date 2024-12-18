<?php
session_start(); // Make sure to start the session if not already started

if (isset($_SESSION['type']) && $_SESSION['type'] === "Barangay Health Worker") {
    ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <h1 class="brand-link text-center">
            <span class="brand-text font-weight-bold" style="font-family: Helvetica; font-size: 17px;">
                Health Record Management
            </span>
        </h1>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar panel -->
            <div class="user-panel pb-3 mb-3">
                <center><img src="../../img/logo.png" style="height: 45%; width: 45%;" alt="logo"></center>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2" style="font-family: Helvetica;">
                <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="../main/dashboard.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-notes-medical"></i>
                            <p>Health Services <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php
                            $healthServices = [
                                ["link" => "../immunization/immunization.php", "text" => "Immunization (0-12 mos. old)"],
                                ["link" => "../deworming1/deworming1-4.php", "text" => "Deworming (1-4 years old)"],
                                ["link" => "../deworming2/deworming5-9.php", "text" => "Deworming (5-9 years old)"],
                                ["link" => "../deworming3/deworming10-19.php", "text" => "Deworming (10-19 years old)"],
                                ["link" => "../nutrition1/nutrition1.php", "text" => "Nutrition and EPI Program I"],
                                ["link" => "../nutrition2/nutrition2.php", "text" => "Nutrition and EPI Program II"],
                                ["link" => "../sickchildren/sickchildren.php", "text" => "Sick Children"],
                                ["link" => "../maternal/maternal.php", "text" => "Maternal Care"],
                                ["link" => "../postpartum/postpartum.php", "text" => "Postpartum Care"]
                            ];

                            foreach ($healthServices as $service) {
                                echo '<li class="nav-item">';
                                echo '<a href="' . htmlspecialchars($service['link']) . '" class="nav-link">';
                                echo '<i class="far fa-circle nav-icon"></i>';
                                echo '<p>' . htmlspecialchars($service['text']) . '</p>';
                                echo '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Report <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../main/weekly.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Weekly Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../main/monthly.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Monthly Report</p>
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
<?php
}
?>
