<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="../styles/aboutUs.css">
    <title>About Us</title>
</head>
<body>
    
    <?php include "./navbar.php" ?>
    <main>
        <div class="img-bg">
            <img src="../assets/imgs/bg-2.avif" alt="">
            <div class="content">
                <h2>Best Chicken Wings</h2>
                <a href="./components/Menus.php">
                    <button>Order Now</button>
                </a>
            </div>
        </div>
        <div class="con-flex">
            <div class="context-con">
                <h4>ABOUT US</h4>
                <div class="title">Ningong's Food Corner</div>
                <div class="context">
                Welcome to Ninong’s Food Corner, where flavor takes center stage! We’re a local food spot passionate about bringing the best chicken wings to your table. Our journey started with a simple idea: to serve wings that pack a punch with every bite. Whether you're a fan of sweet, spicy, or savory, our wide range of flavors has something for everyone.
                </div>
            </div>
            <div class="vid-con">
                <img src="../assets/chicken wings/8pcs wings.png" alt="">
            </div>
        </div>

        <div class="con-flex">
            <div class="img-con">
                <img src="../assets/boneless chicken/4pcs boneless.jpg" alt="">
            </div>
            <div class="context-con">
                <div class="title">Delicious Chicken</div>
                <div class="context">
                At Ninong’s, we believe that food should not only satisfy your hunger but also create an experience. That’s why each order is freshly prepared with the finest ingredients, ensuring quality and taste in every bite. Whether you’re grabbing a quick meal or sharing with friends, our wings are perfect for any occasion.
                </div>
                <div class="context">
                Come by and taste the wings everyone’s talking about. We promise you’ll leave with a happy heart and a satisfied appetite!
                </div>
            </div>
        </div>
    </main>

    <?php include "./footer.php" ?>

    <script src="../scripts/navbar.js"></script>
</body>
</html>