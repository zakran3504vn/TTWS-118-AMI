<?php
include '../config/db_connection.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('Location: contact_messages.php?status=success&message=' . urlencode('Xóa tin nhắn thành công!'));
    } else {
        header('Location: contact_messages.php?status=error&message=' . urlencode('Không thể xóa tin nhắn.'));
    }
    $stmt->close();
} else {
    header('Location: contact_messages.php?status=error&message=' . urlencode('ID không hợp lệ.'));
}
$conn->close();
?>