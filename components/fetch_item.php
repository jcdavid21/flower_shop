<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/fetch_item.css">
    <script src="../jquery/jquery.js"></script>
    <script src="../scripts/sweetalert2.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Item</title>
</head>
<body>
<?php 
require_once("../backend/config/config.php");

if(isset($_GET["type"])){
        // Initialize query
    $query = "SELECT tp.*, tpt.prod_type_name 
    FROM tbl_products tp
    JOIN tbl_product_type tpt ON tp.prod_type = tpt.prod_type_id
    WHERE tp.prod_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_GET["type"]);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($data = $result->fetch_assoc()) {
        $products[] = $data;
        $path = "flowers/".$data["prod_img"];
    }
}else{
    header("Location: ./Menus.php");
}
?>
<?php include "./navbar.php" ?>
    <main>
        <div class="con-items">
            <?php if (!empty($products)) { ?>
            <div class="center">
                <div class="content">
                    <div class="grid">
                        <div class="img-con">
                            <img src="../assets/<?php echo $path; ?>" alt="">
                        </div>
                        <div class="details">
                            <div class="center">
                                <div class="name"><?php echo $products[0]["prod_name"] ?></div>
                                <div class="price">₱<?php echo $products[0]["prod_price"] ?></div>
                            </div>
                            <div class="text">
                                <div class="title">
                                    <?php echo $products[0]["prod_type_name"] ?>
                                </div>
                                <?php echo $products[0]["prod_description"] ?>
                            </div>
                            <div class="cart-details">
                                <div class="title">From <span>*</span></div>
                                <input type="text" id="receiver" placeholder="From">
                                <div class="title">To <span>*</span></div>
                                <input type="text" id="sender" placeholder="To">
                                <div class="title">Message on the card</div>
                                <textarea name="message" id="message" placeholder="Message on the card" rows="5" cols="10"></textarea>
                                <div class="center">
                                    <input type="number" min="1" value="1" id="quantity"
                                    oninput="maxQuantity(this)" placeholder="Quantity">
                                    <button id="submit"
                                    data-prod-id="<?php echo $products[0]["prod_id"]; ?>">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="slide-div">
                        <div class="feedback-container">
                            <div class="feedbacks">
                                <div class="title">Feedbacks</div>
                                <?php 
                                    $queryFd = "SELECT tf.*, CONCAT(td.first_name, ' ', td.last_name) AS full_name FROM tbl_item_feedback tf
                                    INNER JOIN tbl_account_details td ON tf.account_id = td.account_id
                                     WHERE tf.prod_id = ?";
                                    $stmtFd = $conn->prepare($queryFd);
                                    $stmtFd->bind_param("i", $_GET["type"]);
                                    $stmtFd->execute();
                                    $resultFd = $stmtFd->get_result();
                                    if($resultFd->num_rows == 0){
                                        echo "<p>No feedbacks at the moment.</p>";
                                    }
                                    while($row = $resultFd->fetch_assoc()){
                                        $date = new DateTime($row["fd_date"]);
                                ?>
                                <div class="feedback-item">
                                    <div class="name">
                                        <?php echo $row["full_name"] ?>
                                        <span class="date">
                                            <?php echo $date->format("F d, Y") ?>
                                        </span>
                                    </div>
                                    <div class="text">
                                        <?php echo $row["fd_comment"] ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            
                            
                            <div class="feedback-form">
                                <div class="title">Submit Feedback</div>
                                
                                <form method="POST">
                                    
                                    <div class="form-group">
                                        <label for="feedback">Your Feedback</label>
                                        <textarea id="feedback" name="feedback" rows="4" required></textarea>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <button class="button" data-prod-id="<?php echo $_GET["type"] ?>">Submit Feedback</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php } else { ?>
                <div class="no-products-message">
                    <p>No products available at the moment.</p>
                </div>
            <?php } ?>
        </div>
    </main>
    <?php include "./footer.php" ?>
<script src="../scripts/navbar.js"></script>
</body>
</html>

<script>
    $('.img-con-click').click(function() {
        var typeId = $(this).data("item-id");
        const url = `fetch_item.php?type=${typeId}`;
        window.open(url, "_self");
    });

    const quantity = document.getElementById("quantity");

    function maxQuantity(element) {
        if(element.value > 10){
            element.value = 10;
        }
    }
</script>
<script src="../jquery/submitFeedback.js"></script>
<script src="../jquery/addtocart.js"></script>
