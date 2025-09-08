<?php
header('Content-Type: application/json');
include 'config/db_connection.php';

$response = ['success' => false, 'message' => ''];

if (isset($_POST['id'], $_POST['status'])) {
    $id = intval($_POST['id']);
    $status = ($_POST['status'] === 'true') ? 'true' : 'false';

    $sql = "UPDATE products SET outstanding_products = ? WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Đã cập nhật thành công!";
    } else {
        $response['message'] = "Lỗi khi cập nhật DB";
    }
    $stmt->close();
}
$conn->close();

echo json_encode($response);
