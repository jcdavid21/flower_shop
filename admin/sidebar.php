<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion"
  style="background-color: #dd7089;">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading"></div>
        <!-- Link manipulation -->
        <a class="nav-link text-white" href="index.php">
          <div class="sb-nav-link-icon">
            <i class="fas fa-tachometer-alt text-white"></i>
          </div>
          Dashboard
        </a>
        <div class="sb-sidenav-menu-heading"></div>
        <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmployeeProducts" aria-expanded="false" aria-controls="collapseEmployeeProducts">
          <div class="sb-nav-link-icon">
            <i class="fa-solid fa-utensils text-white"></i>
          </div>
          Products List
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down text-white"></i>
          </div>
        </a>
        <div class="collapse" id="collapseEmployeeProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <?php
                $query = "SELECT * FROM tbl_product_type";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while($data = $result->fetch_assoc()){
                    $prodId = $data["prod_type_id"];
                    $prodName = $data["prod_type_name"];
            ?>
            <nav class="sb-sidenav-menu-nested nav" data-type-id="<?php echo $prodId; ?>">
                <a class="nav-link prod-type text-white" data-type-id="<?php echo $prodId; ?>" href="#"><?php echo $prodName; ?></a>
            </nav>
            <?php } ?>
            <nav class="sb-sidenav-menu-nested nav">
              <a  class="nav-link text-white" href="addprod.php">Add Product</a>
            </nav>
        </div>
        <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmployeeAccounts" aria-expanded="false" aria-controls="collapseEmployeeAccounts">
          <div class="sb-nav-link-icon">
            <i class="fa-solid fa-user text-white"></i>
          </div>
          Account List
          <div class="sb-sidenav-collapse-arrow">
            <i class="fas fa-angle-down text-white"></i>
          </div>
        </a>
        <div class="collapse" id="collapseEmployeeAccounts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link text-white" href="customers.php">Active</a>
          </nav>
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link text-white" href="deactivated.php">Deactivated</a>
          </nav>
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link text-white" href="createAccount.php">Create Account</a>
          </nav>
        </div>
        <a class="nav-link text-white" href="reports.php">
          <div class="sb-nav-link-icon">
            <i class="fa-solid fa-hand-holding-dollar text-white"></i>
          </div>
          Feedbacks
        </a>

        <div class="sb-sidenav-menu-heading"> </div>
        <a class="nav-link text-white" href="auditLogs.php">
          <div class="sb-nav-link-icon">
            <i class="fa-solid fa-person-walking text-white"></i>
          </div>
          Audit Logs
        </a>
        <a class="nav-link text-white" href="auditTrail.php">
          <div class="sb-nav-link-icon">
            <i class="fa-solid fa-chart-line text-white"></i>
          </div>
          Audit Trail
        </a>
        <a class="nav-link text-white" href="transHistory.php">
          <div class="sb-nav-link-icon">
            <i class="fa-solid fa-clock-rotate-left text-white"></i>
          </div>
          Transaction History
        </a>
      </div>
    </div>
  </nav>
</div>


