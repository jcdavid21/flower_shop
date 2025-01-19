<?php

require_once("../config/config.php");
session_start();

if(isset($_POST["item_id"]) && isset($_POST["status"])){
    $item_id = $_POST["item_id"];
    $status = $_POST["status"];

    $query = "UPDATE tbl_cart SET item_check = ? WHERE item_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $status, $item_id);
    $stmt->execute();

    echo "updated";
    exit();
}


?>