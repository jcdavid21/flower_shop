<?php
session_start();
if (empty($_SESSION["admin_id"])) {
  header('Location: logout.php');
  exit(); // Prevent further script execution after redirection
}

require_once("../backend/config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cashier Panel</title>
   <!-- Custom fonts for this template -->
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../scripts/font-awesome.js"></script>
    <script src="../scripts/sweetalert2.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../styles/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>
  <body class="page-top">
    
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
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order Details Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                        <?php
                            $status_id = isset($_GET["status_id"]) ? $_GET["status_id"] : 3;
                            $query = "SELECT tc.item_id, tc.account_id, tc.prod_id, tc.prod_qnty, tc.status_id,
                                            tp.prod_name, tp.prod_price, 
                                            CONCAT(ta.first_name, ' ', ta.middle_name, ' ', ta.last_name) as full_name,
                                            ta.contact, ta.address, tn.prod_type_name, tc.receiver, tc.sender
                                    FROM tbl_cart tc 
                                    INNER JOIN tbl_products tp ON tp.prod_id = tc.prod_id 
                                    INNER JOIN tbl_account_details ta ON ta.account_id = tc.account_id 
                                    LEFT JOIN tbl_product_type tn ON tn.prod_type_id = tp.prod_type
                                    WHERE tc.status_id = ?;";

                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $status_id);
                            if ($stmt === false) {
                            die("Error preparing statement: " . $conn->error);
                            }

                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($data = $result->fetch_assoc()) {
                            $total = $data["prod_qnty"] * $data["prod_price"];
                        ?>
                        <tr>
                        <td><?php echo htmlspecialchars($data['item_id']); ?></td>
                        <td><?php echo htmlspecialchars($data['full_name']); ?></td>
                        <td>₱<?php echo number_format($data['prod_price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($data['prod_qnty']); ?></td>
                        <td><?php echo htmlspecialchars($data['prod_type_name']); ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" id="<?php echo htmlspecialchars($data['item_id']); ?>" 
                            data-bs-toggle="modal" data-bs-target="#productDetails<?php echo htmlspecialchars($data['item_id']); ?>" 
                            data-bs-whatever="@getbootstrap">
                                <i class="fa-solid fa-eye" style="color: #fcfcfc;"></i>
                            </button>
                            <?php 
                              if($status_id == 3) {
                            ?>
                            <button type="button" class="btn btn-success updateBtn" id="<?php echo htmlspecialchars($data['item_id']); ?>" data-status-id="<?php echo $data["status_id"] ?>">
                            <i class="fa-solid fa-check" style="color: #fcfcfc;"></i>
                          </button>
                          <?php 
                            }?>
                        <?php 
                            if($status_id == 3 || $status_id == 4) {
                        ?>
        
                          <button type="button" class="btn btn-danger delete-js" id="<?php echo htmlspecialchars($data['item_id']); ?>">
                            <i class="fa-solid fa-ban" style="color: #fcfcfc;"></i>
                          </button>
                        </td>
                        <?php
                        } ?>
                      </tr>

                      <!-- Modal for product details -->
                      <div class="modal fade" id="productDetails<?php echo htmlspecialchars($data['item_id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form method="post">
                                <div class="d-flex">
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Customer Name</label>
                                    <input type="text" class="form-control updatedName" value="<?php echo htmlspecialchars($data['full_name']); ?>" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Customer Address</label>
                                    <input type="text" class="form-control updatedName" value="<?php echo htmlspecialchars($data['address']); ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Customer Contact</label>
                                    <input type="text" class="form-control updatedName" value="<?php echo htmlspecialchars($data['contact']); ?>" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">From</label>
                                    <input type="text" class="form-control updatedName" value="<?php echo htmlspecialchars($data['sender']); ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Receiver</label>
                                    <input type="text" class="form-control updatedName" value="<?php echo htmlspecialchars($data['receiver']); ?>" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Order Name</label>
                                    <input type="text" class="form-control updatedName" value="<?php echo htmlspecialchars($data['prod_name']); ?>" disabled>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Order Price</label>
                                    <input type="text" class="form-control updatedPrice" value="₱<?php echo number_format($data['prod_price'], 2); ?>" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Total</label>
                                    <input type="text" class="form-control updatedPrice" value="₱<?php echo number_format($total, 2); ?>" disabled>
                                    </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                    } // end while
                    ?>
                  </tbody>
                                </table>
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
    <script src="../scripts/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../jquery/sideBarProd.js"></script>
    <script src="../jquery/updatePending.js"></script>
    <script src="../jquery/cancelOrder.js"></script>
    <script src="../scripts/toggle.js"></script>

  </body>
</html>
