<?php
require_once("../backend/config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/cart.css">
    <script src="../jquery/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="../scripts/sweetalert2.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Cart</title>
</head>
<body>
    <?php include "./navbar.php"; ?>
    <?php 
        if (empty($_SESSION["user_id"])) {
            header("Location: ./login.php");
            exit();
        }
        
        $current_user = $_SESSION['user_id'];
    ?>

    <div class="center">
        <div class="h1-div">
            <h1>Delivered Orders</h1>
            <div class="d-flex">
                <a href="./ProcessOrders.php">
                <div class="inner">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                </a>
            </div>
        </div>
    </div>

    <?php
    $query = "SELECT tc.*, tp.*, ts.status_name, tpt.prod_type_name
    FROM tbl_cart tc
    JOIN tbl_products tp ON tc.prod_id = tp.prod_id
    JOIN tbl_status ts ON tc.status_id = ts.status_id
    JOIN tbl_product_type tpt ON tp.prod_type = tpt.prod_type_id
    WHERE tc.account_id = ? AND tc.status_id = 2";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $current_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $total = 0;
        $subtotalOnly = 0;
    ?>
    <main>
        <div class="center">
            <div id="column">
                <div class="left-con">
                    <div class="cart-con">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Sender</th>
                                    <th>Receiver</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = $result->fetch_assoc()) {
                                    $subtotal = round($data["prod_qnty"] * $data["prod_price"], 2);
                                    $total += $subtotal + $data["add_ons_price"];
                                    $formattedTypeName = strtolower(str_replace(' ', '_', $data["prod_type_name"]));
                                    $subtotalOnly += round($data["prod_price"], 2);
                                ?>
                                <tr>
                                    <td>
                                        <div class="img-con">
                                        <img src="../assets/<?php echo $formattedTypeName; ?>/<?php echo $data["prod_img"]; ?>" alt="">
                                        </div>
                                    </td>
                                    <td><?php echo $data["prod_name"]; ?></td>
                                    <td>₱<?php echo number_format($data["prod_price"], 2); ?></td>
                                    <td>
                                        <div class="qnty-td">
                                          
                                            <div class="qnty-js"><?php echo $data["prod_qnty"]; ?></div>
                                            
                                        </div>
                                    </td>
                                    <td class="total-price-js">₱<span class="subtotal-js"><?php echo number_format($subtotal, 2); ?></span></td>
                                    <td><?php echo $data["sender"]; ?></td>
                                    <td><?php echo $data["receiver"]; ?></td>
                                    <td><?php echo $data["status_name"]; ?></td>
                                  
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="right-con">
                    <div class="total-con">
                        <h1>Total:  <span class="text-total">₱<?php echo number_format($total, 2); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    } else {
    ?>
        <div class="no-products-message">
            <p>No products available at the moment.</p>
        </div>
    <?php } ?>





    <?php include "./footer.php"; ?>
    <script src="../scripts/navbar.js"></script>
    <script src="../jquery/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
