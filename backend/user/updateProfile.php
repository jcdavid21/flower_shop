<?php
require_once("../config/config.php");
session_start();

if(isset($_POST["fName"]) && isset($_POST["lName"]) && isset($_POST["address"])
    && isset($_POST["contact"]) && isset($_SESSION["user_id"]))
    {
        $acc_id = $_SESSION["user_id"];
        $first_name = $_POST["fName"];
        $middle_name = $_POST["mName"];
        $last_name = $_POST["lName"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        // $password = $_POST["password"];
        $newPassword = $_POST["confirmPass"];

        if(empty($newPassword)){
            echo "empty";
            exit();
        }

        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);  
        $query = "UPDATE tbl_account 
        SET ac_password = ?
        WHERE account_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $hashPassword, $acc_id);
        $stmt->execute();


        $query = "UPDATE tbl_account_details 
        SET first_name = ?, middle_name = ?, last_name = ?, address = ?, contact = ? WHERE account_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $first_name, $middle_name, $last_name, $address, $contact, $acc_id);
        $stmt->execute();

        echo "updated";
        exit();
    }


?>