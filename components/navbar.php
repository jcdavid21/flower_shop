<header>
    <div class="con">
        <div class="left-row">
            <!-- Logo -->
            <a href="../index.php" class="a-js">
                <h1 style="font-family: 'Dancing Script', cursive; font-size: 40px; font-weight: bold; color: #FC819E; letter-spacing: 1px;">Maris Flower Shop</h1>
            </a>
            <!-- Search Bar -->
            <form method="GET" action="search_results.php" class="search-bar">
                <input type="text" name="query" placeholder="Search flowers..." id="search_bar" required>
                <button type="submit"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>

        <div class="right-row">
            <a href="./Menus.php"><div>Flowers</div></a>
                <a href="
                <?php
                    if(isset($_SESSION["user_id"])){
                        echo "./cart.php";
                    }else{
                        echo "./login.php";
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
                            <a href='./profile.php' class='a-js'>
                                <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                            </a>
                            <i class='fa-solid fa-caret-down fa-xl drop-down' style='color: rgb(96, 96, 96);'></i>
                            <div class='profile-div'>
                                <a href='./profile.php' class='profile'><div>Profile</div></a>
                                <a href='./logout.php' class='logOut'><div>Log out</div></a>
                            </div>
                        </div>
                        ";
                    }else{
                        echo "
                        <a href='./login.php' class='a-js profile-logIn'>
                            <i class='fa-solid fa-user fa-xl' style='color: rgb(96, 96, 96);'></i>
                        </a>
                        ";
                    }
                ?>
            </div>
    </div>
</header>


<script src="../scripts/navbar.js"></script>