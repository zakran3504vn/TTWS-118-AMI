<?php
session_start();
include '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Handle file upload
    $image_url = '';
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image_url'];
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $max_file_size = 5 * 1024 * 1024; // 5MB
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $upload_dir = 'assets/img/';
        
        // Validate file
        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Chỉ hỗ trợ định dạng JPG, JPEG, PNG.'];
            header('Location: add_news.php');
            $conn->close();
            exit;
        }
        if ($file['size'] > $max_file_size) {
            $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Kích thước file tối đa là 5MB.'];
            header('Location: add_news.php');
            $conn->close();
            exit;
        }

        // Create upload directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        // Generate unique filename
        $filename = uniqid('news_') . '.' . $file_extension;
        $destination = $upload_dir . $filename;
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Không thể tải lên hình ảnh.'];
            header('Location: add_news.php');
            $conn->close();
            exit;
        }
        $image_url = "id.truongthanhweb.com/$destination";
    } else {
        $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Vui lòng chọn một hình ảnh.'];
        header('Location: add_news.php');
        $conn->close();
        exit;
    }

    try {
        $stmt = $conn->prepare("INSERT INTO news (title, image_url, content, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param('sss', $title, $image_url, $content);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Thêm tin tức thành công!'];
            header('Location: news.php');
        } else {
            throw new Exception('Không thể thêm tin tức.');
        }
        $stmt->close();
    } catch (Exception $e) {
        // Delete uploaded file if transaction fails
        if ($image_url && file_exists($destination)) {
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
    <title>Thêm Tin Tức</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body class="crm_body_bg">
    <?php
    $currentPage = 'news';
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
                                            <h3>Thêm Tin Tức</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> <a href="news.php">Tin Tức</a> <i class="fas fa-caret-right"></i> Thêm Tin Tức</p>
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
                                    <form action="add_news.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image_url" class="form-label">Hình Ảnh (JPG, JPEG, PNG, tối đa 5MB)</label>
                                            <input type="file" class="form-control" id="image_url" name="image_url" accept=".jpg,.jpeg,.png" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Nội Dung</label>
                                            <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
                                        <a href="news.php" class="btn btn-secondary">Hủy</a>
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