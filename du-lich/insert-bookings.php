<?php
include('../config/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $departure_date = $_POST['departure_date'];
    $adult_quantity = (int)$_POST['adult_quantity'];
    $child_quantity = (int)$_POST['child_quantity'];
    $notes = $_POST['notes'];
    $tour_id = (int)$_POST['tour_id'];
    $total_amount = (float)$_POST['total_amount'];
    $terms_accepted = isset($_POST['terms_accepted']) ? 1 : 0;

    // Prepare SQL statement
    $sql = "INSERT INTO tour_bookings (
        tour_id,
        full_name,
        phone,
        email,
        departure_date,
        adult_quantity,
        child_quantity,
        notes,
        total_amount,
        terms_accepted,
        status,
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', NOW())";

    // Create prepared statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param(
            "issssiisdi",
            $tour_id,
            $full_name,
            $phone,
            $email,
            $departure_date,
            $adult_quantity,
            $child_quantity,
            $notes,
            $total_amount,
            $terms_accepted
        );

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Đặt tour thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Lỗi khi đặt tour: ' . $stmt->error
            ]);
        }

        $stmt->close();
    } else {    
        echo json_encode([
            'status' => 'error',
            'message' => 'Lỗi khi chuẩn bị câu lệnh: ' . $conn->error
        ]);
    }

    $conn->close();
}
?>