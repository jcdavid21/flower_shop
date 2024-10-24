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
    <title>Products</title>
</head>
<body>
    <?php include "./navbar.php" ?>
    <main>
        <div class="center">
            <div class="con">
                <div class="con-header">
                    <div class="header-con">
                        <h1>Menus</h1>
                        <?php 
                            $sql = "SELECT * FROM tbl_product_type";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="products" data-prod-type-id="<?php echo $row['prod_type_id']; ?>"><?php echo $row['prod_type_name'] ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="container" id="product-container">
                    <div class="con-items" id="container-items">

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "./footer.php" ?>
    <script>
        $(document).ready(function(){
            loadProducts(); // Load products on page load
            // Handle clicks on product types
            $('.products').click(function(){
                var typeId = $(this).data('prod-type-id'); // Fetch data attribute instead of using val()
                $('#items').show();
                $(this).css({'background': '#FC819E', 'color': 'white'}).siblings().css({'background': '', 'color': ''});
                loadProducts(typeId);
            });

            $('#add_ons').change(function(){
                $(this).css({'background': '#FC819E', 'color': 'white'});
            })

            $('#flavors').change(function(){
                $(this).css({'background': '#FC819E', 'color': 'white'});
            })

            function loadProducts(typeId = "1") {
                $.ajax({
                    url: 'fetch_products.php',
                    type: 'GET',
                    data: { type: typeId },
                    success: function(response) {
                        $('#container-items').html(response);
                    }
                });
            }
        });
    </script>
    <script src="../scripts/navbar.js"></script>
</body>
</html>
