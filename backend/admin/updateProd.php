<?php 
session_start();
require_once("../reports/reports.php");

if(isset($_POST["prod_id"]) && isset($_POST["prod_name"]) 
    && isset($_POST["prod_price"]) && isset($_POST["stocks"])) {

    $prod_id = $_POST["prod_id"];
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $stocks = $_POST["stocks"];
    $description = $_POST["desc"];

    $account_id = $_SESSION["admin_id"];

    $query = "UPDATE tbl_products SET prod_name=?, prod_price=?, prod_stocks = ?, prod_description = ? WHERE prod_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siisi", $prod_name, $prod_price, $stocks, $description, $prod_id);
    if($stmt->execute()){
        echo "success";
    } else {
        echo "error";
    }

    $query2 = "SELECT tc.*, CONCAT(td.first_name, ' ', td.last_name) AS full_name FROM tbl_account tc
    INNER JOIN tbl_account_details td ON tc.account_id = td.account_id
     WHERE tc.account_id = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $account_id);
    $stmt2->execute();
    $result = $stmt2->get_result();
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $full_name = $data["full_name"];
        $act = "Updated Product ID: $prod_id";
        $type = "Admin";
        report($conn, $account_id, $full_name, $act, $type);
    }

    $stmt->close();
    $conn->close();
}
?>
