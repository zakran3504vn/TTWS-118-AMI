<?php
file_put_contents('debug.log', print_r($_POST, true)); // Add at the start of insert_bookings.php
include('../config/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and validate form data
    $full_name = trim($_POST['full_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $departure_date = trim($_POST['departure_date'] ?? '');
    $adult_quantity = (int)($_POST['adult_quantity'] ?? 1);
    $child_quantity = (int)($_POST['child_quantity'] ?? 0);
    $notes = trim($_POST['notes'] ?? '');
    $tour_id = (int)($_POST['tour_id'] ?? 0);
    $total_amount = (float)($_POST['total_amount'] ?? 0);
    $hotel_id = (int)($_POST['hotel_id'] ?? 0);

    // Validate required fields
    if (empty($full_name) || empty($phone) || empty($email) || empty($departure_date) || $tour_id <= 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Vui lòng điền đầy đủ các trường bắt buộc.'
        ]);
        exit;
    }

    // Validate hotel_id if required
    if ($hotel_id <= 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Vui lòng chọn một khách sạn.'
        ]);
        exit;
    }

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
        hotel_id,
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
            $hotel_id
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
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Phương thức yêu cầu không hợp lệ.'
    ]);
}
?>