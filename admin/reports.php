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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Panel</title>
    <!-- DataTables -->
    <link href="../plugins/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="../plugins/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="../styles/bootstrap5-min.css" rel="stylesheet" />
    <link href="../styles/card-general.css" rel="stylesheet" />
    <script src="../scripts/sweetalert2.js"></script>
    <script
      src="../scripts/font-awesome.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
    <!-- Navbar -->
    <?php require_once("./navbar.php"); ?>
    <!-- Sidebar -->
    <div id="layoutSidenav">
      <?php require_once("./sidebar.php"); ?>
      <!-- Content -->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <!-- Page indicator -->
            <div class="img-con d-flex align-items-center justify-content-center" style="height: 150px;">
                <img src="../assets/imgs/lugo.png" alt=""
                style="height: 100%;">
               </div>
            <h1 class="mt-4" id="full_name"></h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Reports</li>
            </ol>

              <div class="card mb-5">
                    <div class="card-header bg-danger pt-3">
                        <div class="text-center">
                            <p class="card-title text-light">Report List
                        </div>
                    </div>
                    <div class="card-body">
                      <table id="residenceAccounts" class="table table-striped nowrap" style="width:100%">
                        <thead>
                          <tr>
                              <th>Report Id</th>
                              <th>Report Name</th>
                              <th>Report Email</th>
                              <th>Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $query = "SELECT tf.*, CONCAT(td.first_name, ' ', td.last_name) AS full_name, tp.prod_name FROM tbl_item_feedback tf
                            INNER JOIN tbl_account_details td ON tf.account_id = td.account_id
                            INNER JOIN tbl_products tp ON tf.prod_id = tp.prod_id";                            
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                              while ($data = $result->fetch_assoc()) {
                          ?>
                          <tr>
                            <td><?php echo $data['fd_id'];?></td>
                            <td><?php echo $data['full_name'];?></td>
                            <td><?php echo $data['prod_name'];?></td>
                            <td>
                                <button type="button" class="btn btn-primary" id="<?php echo $data["fd_id"] ?>"  data-bs-toggle="modal" 
                                data-bs-target="#residenceAccountDetails<?php echo $data["fd_id"] ?>" data-bs-whatever="@getbootstrap">
                                  <i class="fa-solid fa-eye" style="color: #fcfcfc;"></i>
                                </button>
                   
                            </td>
                          </tr>
                            <div class="modal fade" id="residenceAccountDetails<?php echo $data["fd_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Report Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  <form method="post">
                                    <div class="mb-3">
                                      <label class="col-form-label">Report Name</label>
                                      <input type="text" class="form-control updatedName" disabled value="<?php echo $data["full_name"]; ?>" >
                                    </div>
                                    <div class="mb-3">
                                      <label class="col-form-label">Report Message</label>
                                      <textarea class="form-control" id="message-text" disabled >
                                        <?php echo $data["fd_comment"]; ?>
                                      </textarea>
                                    </div>
                                    </form>
                                  </div>
                                  <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary " value="<?php echo $data["prod_id"]; ?>" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary submit" >Submit</button>
                                  </div> -->
                                </div>
                              </div>
                            </div>
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
      </main>
    </div>
  </div>
  <script
      src="../scripts/bootstrap.bundle.min.js"
    ></script>
    <script src="../scripts/jquery.js"></script>
    <script src="../jquery/responseReport.js"></script>
    <script src="../scripts/toggle.js"></script>
    <!-- <script src="../jquery/modifyProd.js"></script> -->
    <!-- DataTables Scripts -->
    <script src="../plugins/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/js/dataTables.bootstrap5.min.js"></script>
    <script src="../plugins/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/js/responsive.bootstrap5.min.js"></script>

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="../styles/dataTables.min.css">

    <!-- DataTables Buttons JavaScript -->
    <script src="../scripts/dataTables.js"></script>
    <script src="../scripts/ajax.make.min.js"></script>
    <script src="../scripts/ajax.fonts.js"></script>
    <script src="../scripts/dtBtn.html5.js"></script>
    <script>
        function convertToLowercase(input) {
            input.value = input.value.toLowerCase();
        }
    </script>


<!-- <script>
    const full_name = document.getElementById('full_name');
    const acc_data = JSON.parse(localStorage.getItem('adminDetails'))
    full_name.innerText = 'Admin, ' + acc_data.full_name;
  </script>  -->
<script src="../jquery/sideBarProd.js"></script> 
  </body>
</html>
