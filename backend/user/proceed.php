<?php 
require_once("../config/config.php");
session_start();

// Define the function outside of any loops
function check_stocks($conn, $prod_id, $prod_qnty, $item_id){
    $query = "SELECT prod_stocks FROM tbl_products WHERE prod_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stocks = $data["prod_stocks"];
    if ($prod_qnty > $stocks) {
        $updateDelete = "DELETE FROM tbl_cart WHERE item_id = ?";
        $stmt = $conn->prepare($updateDelete);
        $stmt->bind_param("i", $item_id);
        $stmt->execute();

        return false;
    } else {
        return true;
    }
}

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $date = date('Y-m-d');
    $check = false;

    $selectQuery = "SELECT * FROM tbl_cart WHERE account_id = ? AND status_id = 1 AND item_check = 1";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while($data = $result->fetch_assoc()){
        $prod_id = $data["prod_id"];
        $prod_qnty = $data["prod_qnty"];
        $item_id = $data["item_id"];

        if(!check_stocks($conn, $prod_id, $prod_qnty, $item_id)){
            $check = true;
        }
    }

    if($check){
        echo "stocks";
        exit();
    }


    // Check if a file was uploaded
    if (isset($_FILES['receipt']) && $_FILES['receipt']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../receipts/';
        $originalFileName = basename($_FILES['receipt']['name']);
        $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

        // Validate file type
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "invalid_file_type";
            exit();
        }

        // Generate a unique file name
        $uniqueFileName = uniqid() . '.' . $fileExtension;
        $uploadFile = $uploadDir . $uniqueFileName;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES['receipt']['tmp_name'], $uploadFile)) {
            $ref_number = $_POST["refNumber"];
            $depositAmount = $_POST["depositAmount"];
            $sender_name = $_POST["gcashName"];
            $sender_address = $_POST["senderAddress"];
            $status_id = 3;
            

            // Insert receipt for each branch
            $receiptQuery = "INSERT INTO tbl_receipt (account_id, receipt_img, receipt_number, deposit_amount, uploaded_date, sender_name, sender_address) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($receiptQuery);
            $stmt->bind_param("ississs", $user_id, $uniqueFileName, $ref_number, $depositAmount, $date, $sender_name, $sender_address);

            if ($stmt->execute()) {
                // Update the cart status to 'claimed' (status_id = 3)
                $cartQuery = "UPDATE tbl_cart SET status_id = ?, order_date = ? WHERE account_id = ? AND status_id = 1 AND item_check = 1";
                $stmt = $conn->prepare($cartQuery);
                $stmt->bind_param("isi", $status_id, $date, $user_id);

                if ($stmt->execute()) {
                    echo "success";
                } else {
                    echo "error_updating_cart";
                    exit();
                }
            } else {
                echo "error_inserting_receipt";
                exit();
            }
        } else {
            echo "file_upload_error";
            exit();
        }
    } else {
        echo "no_file_or_upload_error";
        exit();
    }
} else {
    echo "user_not_logged_in";
}
?>