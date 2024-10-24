<?php
session_start();
require_once("../reports/reports.php");

if(isset($_POST["prod_name"]) && isset($_POST["prod_price"]) && 
    isset($_POST["prod_type"]) && isset($_POST["prod_stocks"]) && isset($_FILES["prod_img"])) {

    $admin_id = $_SESSION["admin_id"];
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $prod_type = $_POST['prod_type'];
    $prod_stocks = $_POST['prod_stocks'];
    $targetDir = "";

    $targetDir = "../../assets/flowers/";

    if(isset($_FILES['prod_img'])){
        $prod_img = $_FILES['prod_img'];

        $targetFile = $targetDir . basename($prod_img['name']);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != 'webp') {
            echo "error_image_format";
            exit();
        }

        if (!move_uploaded_file($prod_img["tmp_name"], $targetFile)) {
            echo "error_uploading_image";
            exit();
        }
    }

    $query = "INSERT INTO tbl_products (prod_name, prod_price, prod_type, prod_stocks, prod_img) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siids", $prod_name, $prod_price, $prod_type, $prod_stocks, $prod_img['name']);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error_inserting_data";
    }
} else {
    echo "error_invalid_request";
}
?>
