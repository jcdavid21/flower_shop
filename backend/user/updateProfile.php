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
        $password = $_POST["password"];
        $newPassword = $_POST["confirmPass"];

        if(!empty($password) && empty($newPassword)){
            echo "empty";
            exit();
        }

        if(!empty($newPassword))
        {
            if(!empty($password))
            {
                $query = "SELECT * FROM tbl_account WHERE account_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $acc_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    $data = $result->fetch_assoc();
                    $hashedPassword = $data["ac_password"];

                    if(password_verify($password, $hashedPassword))
                    {
                        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);  
                        $query = "UPDATE tbl_account 
                        SET ac_password = ?
                        WHERE account_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("si", $hashPassword, $acc_id);
                        $stmt->execute();
                    }else{
                        echo "invalid";
                        exit();
                    }
                }
            }else{
                echo "empty";
                exit();
            }
        }


        $query = "UPDATE tbl_account_details 
        SET first_name = ?, middle_name = ?, last_name = ?, address = ?, contact = ? WHERE account_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $first_name, $middle_name, $last_name, $address, $contact, $acc_id);
        $stmt->execute();

        echo "updated";
        exit();
    }


?>