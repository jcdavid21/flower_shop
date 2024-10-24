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
            <h1>Your Cart</h1>
            <div>
                <a href="./ProcessOrders.php">On Process Orders</a>
            </div>
            <div>
                <a href="./history.php">Claimed Orders</a>
            </div>
        </div>
    </div>

    <?php
    $query = "SELECT tc.*, tp.*, ts.status_name, tpt.prod_type_name
    FROM tbl_cart tc
    JOIN tbl_products tp ON tc.prod_id = tp.prod_id
    JOIN tbl_status ts ON tc.status_id = ts.status_id
    JOIN tbl_product_type tpt ON tp.prod_type = tpt.prod_type_id
    WHERE tc.account_id = ? AND tc.status_id = 1";
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
            <div class="div">
                <div class="left-con">
                    <div class="cart-con">
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = $result->fetch_assoc()) {
                                    $subtotal = round($data["prod_qnty"] * $data["prod_price"], 2);
                                    $total += $subtotal;
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
                                            <div class="minus-btn" data-item-id="<?php echo $data["item_id"] ?>">-</div>
                                            <div class="qnty-js"><?php echo $data["prod_qnty"]; ?></div>
                                            <div class="add-btn" data-item-id="<?php echo $data["item_id"] ?>">+</div>
                                        </div>
                                    </td>
                                    <td><?php echo $data["receiver"] ?></td>
                                    <td><?php echo $data["sender"] ?></td>
                                    <td class="total-price-js">₱<span class="subtotal-js"><?php echo number_format($subtotal, 2); ?></span></td>
                                    <td class="delete-js" id="<?php echo $data["item_id"]; ?>"><i class="fa-solid fa-x"></i></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="right-con">
                    <div class="total-con">
                        <h1>Order Summary</h1>
                        <div class="price-div">
                            <div class="text">
                                <div>Subtotal/Item:</div>
                                <span class="text-price">₱<?php echo number_format($subtotalOnly, 2); ?></span>
                            </div>
                            <div class="text">
                                <div>Total:</div>
                                <div class="text-total">₱<?php echo number_format($total, 2); ?></div>
                            </div>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Order now</button>
                        </div>
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

    <!--MODAL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Receipt Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">
                        <label class="col-form-label">Amount to be pay:</label>
                        <input type="text" disabled id="overAllTotal" class="font-weight-bold w-100 text-danger" value="₱<?php echo number_format($total, 2); ?>">
                    </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Your Receipt:</label>
                            <input type="file" class="form-control-file" id="receiptFile">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Reference Number</label>
                            <input type="text" class="form-control" id="refNumber" maxlength="13"
                            placeholder="Gcash Reference Number">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Deposit Amount:</label>
                            <input type="text" class="form-control" id="depAmount" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                        <div class="img-con" style="height: 350px; padding-bottom: 20px;">
                            <label class="col-form-label">Send Your Payment Here:</label>
                            <img src="../assets/imgs/qr.jpeg" alt="" style="object-fit: contain;">
                        </div>
                    </form>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary proceed-btn">Proceed</button>
                </div>
            </div>
        </div>
    </div>





    <?php include "./footer.php"; ?>
    <script src="../scripts/navbar.js"></script>
    <script src="../jquery/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
