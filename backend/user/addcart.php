<?php
require_once("../config/config.php");
session_start();

if (isset($_POST["prodId"]) && isset($_POST["qnty"]) && isset($_POST["receiver"]) && isset($_POST["sender"])) {
    $account_id = $_SESSION["user_id"];
    $prod_id = $_POST["prodId"];
    $prod_qnty = $_POST["qnty"];
    $receiver = $_POST["receiver"];
    $sender = $_POST["sender"];
    $message = $_POST["message"];

    // Check if the product is already in the cart
    $query = "SELECT * FROM tbl_cart WHERE prod_id = ? AND account_id = ? AND status_id = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $prod_id, $account_id);
    $stmt->execute();
    $result = $stmt->get_result();



    if ($result->num_rows > 0) {
        echo "exceeds";
    } else {
        
        function check_stocks($conn, $prod_id, $prod_qnty){
            $query = "SELECT prod_stocks FROM tbl_products WHERE prod_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $prod_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stocks = $data["prod_stocks"];
            if ($prod_qnty > $stocks) {
                return false;
            } else {
                
                return true;
            }
        }

        if(!check_stocks($conn, $prod_id, $prod_qnty)){
            echo "stocks";
            exit();
        }

        $query2 = "INSERT INTO tbl_cart (prod_id, prod_qnty, account_id, receiver, sender, message) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("iiisss", $prod_id, $prod_qnty, $account_id, $receiver, $sender, $message);
        $stmt2->execute();
        $item_id = $stmt2->insert_id;

        echo "success";
    }
    exit();
}
?>
