<?php
    require_once("../config/config.php");

    if(isset($_POST["fname"]) && isset($_POST["mname"])
    && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["contactNo"])
    && isset($_POST["address"]) && isset($_POST["password"]))
    {
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $contactNo = $_POST["contactNo"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $role_id = 1;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "SELECT * FROM tbl_account WHERE ac_email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            echo "existed";
        }else{
            $query2 = "INSERT INTO tbl_account (ac_email, ac_password, role_id)
            VALUES(?, ?, ?)";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("ssi", $email, $hashedPassword, $role_id);
            $stmt2->execute();
            
            $account_id = $stmt2->insert_id;

            $query3 = "INSERT INTO tbl_account_details (account_id, first_name, middle_name, last_name, contact, address)
            VALUES(?, ?, ?, ?, ?, ?)";
            $stmt3 = $conn->prepare($query3);
            $stmt3->bind_param("isssss", $account_id, $fname, $mname, $lname, $contactNo, $address);
            $stmt3->execute();
        }
    }

?>