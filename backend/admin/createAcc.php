<?php
session_start();
require_once("../reports/reports.php");

if(isset($_POST["fname"]) && isset($_POST["mname"]) &&
   isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["contactNo"]) &&
   isset($_POST["address"]) && isset($_POST["password"]) &&
   isset($_POST["role_id"])) {

    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $contactNo = $_POST["contactNo"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $role_id = $_POST["role_id"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $admin_id = $_SESSION["admin_id"];

    // Check if email already exists
    $query = "SELECT * FROM tbl_account WHERE ac_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s",  $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        echo "existed";
    } else {
        // Insert into tbl_account
        $query2 = "INSERT INTO tbl_account (ac_email, ac_password, role_id)
                   VALUES(?, ?, ?)";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("ssi", $email, $hashedPassword, $role_id);
        $stmt2->execute();

        $account_id = $stmt2->insert_id;

        // Insert into tbl_account_details
        $query3 = "INSERT INTO tbl_account_details (account_id, first_name, middle_name, last_name, contact, address)
                   VALUES(?, ?, ?, ?, ?, ?)";
        $stmt3 = $conn->prepare($query3);
        $stmt3->bind_param("isssss", $account_id, $fname, $mname, $lname, $contactNo, $address);
        $stmt3->execute();

        // Fetch admin information for reporting
        $query4 = "SELECT tc.*, CONCAT(td.first_name, ' ', td.last_name) AS full_name 
                   FROM tbl_account tc
                   INNER JOIN tbl_account_details td ON tc.account_id = td.account_id
                   WHERE tc.account_id = ?";
        $stmt4 = $conn->prepare($query4);
        $stmt4->bind_param("i", $admin_id);
        $stmt4->execute();
        $result = $stmt4->get_result();

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $username = $data["full_name"];
            $act = "Create Account";
            $type = "Admin";

            // Call report function
            report($conn, $admin_id, $username, $act, $type);
        }
    }
}
?>
