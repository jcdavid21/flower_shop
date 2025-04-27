<?php require_once('./backend/config/config.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/general.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Home</title>
</head>
<body>
<header>
    <div class="con">
        <div class="left-row">
            <!-- Logo -->
            <a href="../index.php" class="a-js">
                <h1 style="font-family: 'Dancing Script', cursive; font-size: 40px; font-weight: bold; color: #FC819E; letter-spacing: 1px;">Maris Flower Shop</h1>
            </a>
            <!-- Search Bar -->
            <form method="GET" action="./components/search_results.php" class="search-bar">
                <input type="text" name="query" placeholder="Search flowers..." id="search_bar" required>
                <button type="submit"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>

        <div class="right-row">
            <a href="./components/Menus.php"><div>
                Flowers
            </div></a>
                <a href="
                <?php
                    if(isset($_SESSION["user_id"])){
                        echo "./components/cart.php";
                    }else{
                        echo "./components/login.php";
                    }
                ?>
                " class="a-js">
                    <div class="relative">
                        <i class="fa-solid fa-cart-shopping fa-xl" style="color: rgb(96, 96, 96);"></i>
                        <div class="count">
                            <?php
                                if(isset($_SESSION["user_id"]))
                                {
                                    $user_id = $_SESSION["user_id"];
                                    $query = "SELECT * FROM tbl_cart WHERE account_id = ? AND status_id = 1";
                                    $stmt = $conn->prepare($query);
                                    $stmt->bind_param("i", $user_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    echo $result->num_rows;
                                }else{
                                    echo "0";
                                }
                            ?>
                        </div>
                    </div>
                </a>
                <?php
                    if(isset($_SESSION["user_id"]))
                    {
                        echo "
                        <div class='profile-logIn'>
                            <a href='./components/profile.php' class='a-js'>
                                <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                            </a>
                            <i class='fa-solid fa-caret-down fa-xl drop-down' style='color: rgb(96, 96, 96);'></i>
                            <div class='profile-div'>
                                <a href='./components/profile.php' class='profile'><div>Profile</div></a>
                                <a href='./components/logout.php' class='logOut'><div>Log out</div></a>
                            </div>
                        </div>
                        ";
                    }else{
                        echo "
                        <a href='./components/login.php' class='a-js profile-logIn'>
                            <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                        </a>
                        ";
                    }
                ?>
            </div>
    </div>
</header>

    <main>
        <div class="center">
            <div class="con">
                <div class="img-con">
                    <img src="./assets/imgs/home-bg.avif" alt="">
                    <div class="context">
                        <div>We Arrange Flowers For All Ocasions</div>
                        <a href="./components/Menus.php"><button>Shop Now</button></a>
                    </div>
                </div>
                <div class="center">
                    <div class="slideshow-div">
                        <div class="header-con"> 
                            <h1>Best Sellers</h1>
                        </div>
                        <div class="slideshow-container">
                            <?php 
                                $query = "SELECT ts.*, tp.prod_type_name FROM tbl_best_seller ts INNER JOIN tbl_product_type tp ON ts.prod_type = tp.prod_type_id";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while($row = $result->fetch_assoc()){
                                    $path = $row["prod_type_name"] . "/" . $row["prod_img"];
                            ?>
                            <div class="con img-con-click" data-item-id="<?php echo $row["prod_id"]?> ">
                                <div class="slide active">
                                <img src="./assets/<?php echo $path; ?>" alt="Slide 1">
                                </div>
                                <div class="title"><?php echo $row["prod_name"] ?>
                                    <div>₱<?php echo $row["prod_price"] ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <div class="slideshow-div">
                        <div class="header-con"> 
                            <h1>Fare well flowers</h1>
                        </div>
                        <div class="slideshow-container">
                            <div class="img-con-click" data-item-id="19">
                                <div class="slide active">
                                <img src="./assets/flowers/A life remembered.png" alt="Slide 1">
                                </div>
                                <div class="title">A life remembered
                                    <div>₱2000.00</div>
                                </div>
                            </div>
                            <div class="img-con-click" data-item-id="17">
                                <div class="slide">
                                <img src="./assets/flowers/beaming.png" alt="Slide 2">
                                </div>
                                <div class="title">
                                    Beaming
                                    <div>₱1400.00</div>
                                </div>
                            </div>
                            <div class="img-con-click" data-item-id="18">
                                <div class="slide">
                                <img src="./assets/flowers/Sincerity.png" alt="Slide 3">
                                </div>
                                <div class="title">
                                Sincerity
                                    <div>₱3000.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


        <footer class="footer">
            <div class="footer-container">
                <div class="footer-row">
                    <div class="footer-col">
                        <h4>Contact us</h4>
                        <ul>
                            <li><p>ADRESS:</p></li>
                            <li><p>315-P. Dela Cruz St.</p></li>
                            <li><p>San Bartolome</p></li>
                            <li><p>Novaliches</p></li>
                            <li><p>Quezon City</p></li>
                            <li><p>San Bartolome</p></li>
                            <li><p>MOBILE:</p></li>
                            <li><p>0919-206-6568</p></li>
                            <li><p>TELEPHONE:</p></li>
                            <li><p>8514-06-31</p></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Get Help</h4>
                        <ul>
                            <li><a href="components/aboutUs.php">About Us</a></li>
                            <li><a href="components/privacyPolicy.php">Privacy Policy</a></li>
                            <li><a href="components/terms.php">Terms & Conditions</a></li>
                            <li><a href="components/paymentPage.php">Payment Terms / Payment Instructions</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h4>Customer Service</h4>
                        <ul>
                            <li><a href="">FAQ</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                    <h4>Follow us on social media</h4>
                        <ul class="social-media-icons">
                            <a href="./components/item6.php"><img src="./assets/imgs/lugo.png" alt=""></a>
                            <ul style="list-style: none; display: flex; justify-content: center; align-items: center; padding: 0;">
                            <a href="https://www.instagram.com/marisflowershop/"><li style="margin-right: 15px;"><i class="fa-brands fa-square-instagram" style="font-size: 24px; color: #333;"></i></li></a>
                            <a href="https://www.facebook.com/marisflowershop"><li><i class="fa-brands fa-square-facebook" style="font-size: 24px; color: #333;"></i></li></a>
                            </ul>
                        </ul>
                    </div>
                    
                </div>

        <!------A white line seperates the footer and the rights reserved------>
                <hr>
                <p class = "copyright" style="color:black">Designed and Developed by Tri-Tech<br>©2024 </p>
            </div>
        </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    if (JSON.parse(localStorage.getItem("userDetails"))) {
        const dropDown = document.querySelector(".drop-down");
        const profileDiv = document.querySelector(".profile-div");
        let count = 0;

        if (dropDown && profileDiv) {
            dropDown.addEventListener("click", function() {
                if (count === 0) {
                    profileDiv.style.display = "block";
                    count = 1;
                } else {
                    profileDiv.style.display = "none";
                    count = 0;
                }
            });
        }

        const logOut = document.querySelector(".logOut");
        
        if (logOut) {
            logOut.addEventListener("click", () => {
                localStorage.removeItem("logInAcc");
            });
        }
    }
});

</script>
<script>
    $('.img-con-click').click(function() {
        var typeId = $(this).data("item-id");
        const url = `./components/fetch_item.php?type=${typeId}`;
        window.open(url, "_blank");
    });
</script>
</body>
</html>