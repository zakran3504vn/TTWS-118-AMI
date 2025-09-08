<?php
include '../config/db_connection.php';
header('Content-Type: application/json');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Xóa tin nhắn thành công!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Không thể xóa tin nhắn.']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'ID không hợp lệ.']);
}
$conn->close();
?>