<?php

    session_start();
    require_once("../reports/reports.php");

    if(isset($_GET["account_id"])){
        $account_id = $_GET["account_id"];
        $admin_id = $_SESSION["admin_id"];

        $query = "UPDATE tbl_account SET account_status_id = 2 WHERE account_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $account_id);
        $stmt->execute();
        echo "success";

        $query2 = "SELECT tc.*, CONCAT(td.first_name, ' ', td.last_name) AS full_name FROM tbl_account tc
    INNER JOIN tbl_account_details td ON tc.account_id = td.account_id
     WHERE tc.account_id = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("i", $admin_id);
        $stmt2->execute();
        $result = $stmt2->get_result();
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $username = $data["full_name"];
            $act = "Deactivated Account ID: $account_id";
            $type = "Admin";
            report($conn, $admin_id, $username, $act, $type);
        }

    }

?>