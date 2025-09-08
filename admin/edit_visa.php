<?php
session_start();
include '../config/db_connection.php';

if (!isset($_GET['id'])) {
    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'ID dịch vụ visa không hợp lệ.'];
    header('Location: visa_services.php');
    $conn->close();
    exit;
}

$visa_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM visa_services WHERE visa_service_id = ?");
$stmt->bind_param('i', $visa_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Dịch vụ visa không tồn tại.'];
    header('Location: visa_services.php');
    $stmt->close();
    $conn->close();
    exit;
}
$visa = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    // Handle file upload (optional)
    $image_url = $visa['image_url'];
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image_url'];
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $max_file_size = 5 * 1024 * 1024; // 5MB
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $upload_dir = 'assets/img/';
        
        // Validate file
        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Chỉ hỗ trợ định dạng JPG, JPEG, PNG.'];
            header('Location: edit_visa.php?id=' . urlencode($visa_id));
            $conn->close();
            exit;
        }
        if ($file['size'] > $max_file_size) {
            $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Kích thước file tối đa là 5MB.'];
            header('Location: edit_visa.php?id=' . urlencode($visa_id));
            $conn->close();
            exit;
        }

        // Create upload directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        // Generate unique filename
        $filename = uniqid('visa_') . '.' . $file_extension;
        $destination = $upload_dir . $filename;
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Không thể tải lên hình ảnh.'];
            header('Location: edit_visa.php?id=' . urlencode($visa_id));
            $conn->close();
            exit;
        }
        $image_url = "id.truongthanhweb.com/$destination";

        // Delete old image if it exists
        if ($visa['image_url'] && file_exists(str_replace('id.truongthanhweb.com/', '', $visa['image_url']))) {
            unlink(str_replace('id.truongthanhweb.com/', '', $visa['image_url']));
        }
    }

    try {
        $stmt = $conn->prepare("UPDATE visa_services SET title = ?, image_url = ?, description = ? WHERE visa_service_id = ?");
        $stmt->bind_param('sssi', $title, $image_url, $description, $visa_id);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Cập nhật dịch vụ visa thành công!'];
            header('Location: visa_services.php');
        } else {
            throw new Exception('Không thể cập nhật dịch vụ visa.');
        }
        $stmt->close();
    } catch (Exception $e) {
        // Delete uploaded file if transaction fails
        if ($image_url !== $visa['image_url'] && file_exists($destination)) {
            unlink($destination);
        }
        $_SESSION['flash_message'] = ['status' => 'danger', 'message' => $e->getMessage()];
    }
    $conn->close();
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Chỉnh Sửa Dịch Vụ Visa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
    <style>
        .current-image {
            max-width: 100px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="crm_body_bg">
    <?php
    $currentPage = 'visa_services';
    include('./includes/sidebar.php');
    ?>
    <section class="main_content dashboard_part">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="profile_info">
                                <img src="./img/client_img-1.png" alt="#">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p>Xin Chào </p>
                                        <h5><?php echo $_SESSION['fullname']; ?></h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="../profile/index.php">Thông Tin Cá Nhân</a>
                                        <a href="#">Cài Đặt</a>
                                        <a href="../logout.php">Đăng Xuất</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_content_iner">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="dashboard_header mb_50">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="dashboard_header_title">
                                            <h3>Chỉnh Sửa Dịch Vụ Visa</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> <a href="visa_services.php">Dịch Vụ Visa</a> <i class="fas fa-caret-right"></i> Chỉnh Sửa Dịch Vụ Visa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_SESSION['flash_message'])): ?>
                                        <div class="alert alert-<?php echo $_SESSION['flash_message']['status']; ?> alert-dismissible fade show" role="alert">
                                            <?php echo htmlspecialchars($_SESSION['flash_message']['message']); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php unset($_SESSION['flash_message']); ?>
                                    <?php endif; ?>
                                    <form action="edit_visa.php?id=<?php echo urlencode($visa_id); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($visa['title'] ?? ''); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image_url" class="form-label">Hình Ảnh (JPG, JPEG, PNG, tối đa 5MB)</label>
                                            <?php if ($visa['image_url']): ?>
                                                <div>
                                                    <img src="<?php echo htmlspecialchars($visa['image_url']); ?>" class="current-image" alt="Current Visa Image">
                                                    <p>Hình ảnh hiện tại: <?php echo htmlspecialchars(basename($visa['image_url'])); ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <input type="file" class="form-control" id="image_url" name="image_url" accept=".jpg,.jpeg,.png">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô Tả</label>
                                            <textarea class="form-control" id="description" name="description" rows="6" required><?php echo htmlspecialchars($visa['description'] ?? ''); ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                        <a href="visa_services.php" class="btn btn-secondary">Hủy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<?php $conn->close(); ?>