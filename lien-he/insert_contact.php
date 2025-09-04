<?php
include('../config/db_connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $content = $_POST['message'];

    $sql = "INSERT INTO contact_messages (full_name, phone, email, subject, message, created_at)
            VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $phone, $email, $subject, $content);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "ERROR";
    }

    $stmt->close();
    $conn->close();
}

?>