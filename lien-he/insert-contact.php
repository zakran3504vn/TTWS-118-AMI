<?php
include('../config/db_connection.php');
include('../truongthanhwebkit/webkit.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $content = $_POST['message'];
    $address = "";

    $result = insertContactCustomer($conn, $name, $email, $phone, $address, $subject, $content);
    if($result['success'] == true){
        header('location: ./index.php?success=1');
    }
    else {
        header('location: ./index.php?error=1');
    }
}

?>