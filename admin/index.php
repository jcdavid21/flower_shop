<?php
session_start();
if(empty($_SESSION["admin_id"])){
  header('Location:logout.php');
}
require_once("../backend/config/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../styles/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "navbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
                    <p class="mb-4">Maximize efficiency and control with comprehensive, easy-to-access dashboard insights.
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-10 col-lg-7">
                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Monthly Sales</h6>
                                </div>
                                <div class="card-body">
                                  <?php 
                                    date_default_timezone_set('Asia/Manila');
                                    $monthlyBc = [];
                                    $serviceRequestBcCount = [];
                      
                                    $currentYear = date("Y");
                                    
                                    // Fetch data for the current year only
                                    $monthlyBcRequest = mysqli_query($conn, "SELECT 
                                          m.MonthName AS Dates,
                                          IFNULL(SUM(tc.prod_qnty * tp.prod_price), 0) AS serviceRequestBcCount
                                      FROM
                                          (SELECT 'January' AS MonthName, 1 AS MonthNumber UNION ALL
                                          SELECT 'February', 2 UNION ALL
                                          SELECT 'March', 3 UNION ALL
                                          SELECT 'April', 4 UNION ALL
                                          SELECT 'May', 5 UNION ALL
                                          SELECT 'June', 6 UNION ALL
                                          SELECT 'July', 7 UNION ALL
                                          SELECT 'August', 8 UNION ALL
                                          SELECT 'September', 9 UNION ALL
                                          SELECT 'October', 10 UNION ALL
                                          SELECT 'November', 11 UNION ALL
                                          SELECT 'December', 12) AS m
                                      LEFT JOIN tbl_cart tc ON MONTH(tc.order_date) = m.MonthNumber 
                                          AND YEAR(tc.order_date) = $currentYear 
                                          AND tc.status_id = 2
                                      LEFT JOIN tbl_products tp ON tp.prod_id = tc.prod_id
                                      GROUP BY m.MonthNumber
                                      ORDER BY m.MonthNumber;
");
                      
                                    foreach ($monthlyBcRequest as $data) {
                                    $monthlyBc[] = $data['Dates'];
                                    $serviceRequestBcCount[] = $data['serviceRequestBcCount'];
                                    }
                                  ?>
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                    <hr>
                                    View the monthly sales performance of the business.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <script>
      var monthlyBc = <?php echo json_encode($monthlyBc); ?>;
      var serviceRequestBcCount = <?php echo json_encode($serviceRequestBcCount); ?>;
    </script>


    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <!-- <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="../js/demo/chart-bar-demo.js"></script> -->
    <script src="../jquery/sideBarProd.js"></script>  


</body>

</html>