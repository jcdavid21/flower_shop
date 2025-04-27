<?php require_once("../backend/config/config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/products.css">
    <script src="../jquery/jquery.js"></script>
    <script src="../scripts/sweetalert2.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Search Results</title>
</head>
<body>
    <?php include "./navbar.php" ?>
    <main>
        <div class="center">
            <div class="con flex">
                <div class="con-header">
                    <div class="header-con">
                        <?php
                        // Get search query
                        $query = isset($_GET['query']) ? trim($_GET['query']) : '';
                        if (empty($query)) {
                            echo "<h1>No search term provided</h1>";
                            exit;
                        }
                        ?>
                        <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
                    </div>
                </div>
                <div class="container" id="product-container">
                    <div class="con-items" id="container-items">
                        <?php
                        // Search products
                        if (!empty($query)) {
                            // Prepare search query with wildcards for partial matches
                            $searchQuery = "%" . $query . "%";
                            
                            // SQL query to search for products by name or description
                            $sql = "SELECT pt.prod_type_name, tp.* 
                                    FROM tbl_products tp 
                                    INNER JOIN tbl_product_type pt ON tp.prod_type = pt.prod_type_id 
                                    WHERE tp.prod_name LIKE ? OR tp.prod_description LIKE ?";
                            
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss", $searchQuery, $searchQuery);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            // Check if we have results
                            if ($result->num_rows > 0) {
                                ?>
                                <div class="con-items">
                                    <div class="items-img">
                                        <?php while ($data = $result->fetch_assoc()) { ?>
                                            <div>
                                                <div class="img-con">
                                                    <img src="../assets/<?php echo "flowers/" . $data["prod_img"] ?>" alt="<?php echo $data["prod_name"] ?>">
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
                            } else {
                                echo "<h2>No products found matching your search.</h2>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "./footer.php" ?>
    <script>
        $(document).ready(function(){
            // Handle clicks on view product buttons
            $('.img-con-click').click(function() {
                var typeId = $(this).data("item-id");
                const url = `fetch_item.php?type=${typeId}`;
                window.open(url, "_self");
            });
        });
    </script>
    <script src="../scripts/navbar.js"></script>
</body>
</html>