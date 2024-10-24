<?php 
require_once("../backend/config/config.php");

if (isset($_GET['type'])) {
    $type = intval($_GET['type']);
    $query = "SELECT pt.prod_type_name, tp.* FROM tbl_products tp INNER JOIN tbl_product_type pt ON tp.prod_type = pt.prod_type_id WHERE tp.prod_type = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $type);
    $stmt->execute();
    $result = $stmt->get_result();

    // Store query results in an array
    $products = [];
    while ($data = $result->fetch_assoc()) {
        $products[] = $data;
    }
?>
    <div class="con-items">
        <div class="items-img">
            <?php if(empty($products)){
                echo "<h1>No products available</h1>";
            } ?>
            <?php 
                foreach ($products as $data) {
            ?>
            <div>
                <div class="img-con">
                    <img src="../assets/<?php echo "flowers/" . $data["prod_img"] ?>" alt="">
                </div>
                <div class="details">
                    <div class="prod-name"><?php echo $data["prod_name"] ?></div>
                    <div class="prod-price" id="price">₱<?php echo $data["prod_price"] ?>
                        <div class="add-cart">
                            <button class="img-con-click" data-item-id="<?php echo $data["prod_id"] ?>">View Product
                            <div class="check"><i class="fa-solid fa-check"></i></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
<?php
}
?>
<script>
    $('.img-con-click').click(function() {
        var typeId = $(this).data("item-id");
        const url = `fetch_item.php?type=${typeId}`;
        window.open(url, "_blank");
    });
</script>
