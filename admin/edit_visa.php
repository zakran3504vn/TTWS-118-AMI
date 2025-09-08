<?php
session_start();
include('../config/db_connection.php');


if (!isset($_GET['id'])) {
    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'ID bài viết không hợp lệ.'];
    header('Location: visa_services.php');
    $conn->close();
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM news WHERE id = ? AND category = 'Visa'");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Bài viết không tồn tại.'];
    header('Location: visa_services.php');
    $stmt->close();
    $conn->close();
    exit;
}
$news = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $summary = trim($_POST['summary']);
    $content = trim($_POST['content']);
    $image = trim($_POST['image']);
    $isTop = isset($_POST['isTop']) ? 'true' : 'false';

    // Generate slug from title
    $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
    $slug = trim($slug, '-');

    $stmt = $conn->prepare("UPDATE news SET title = ?, summary = ?, content = ?, image = ?, isTop = ?, slug = ? WHERE id = ? AND category = 'Visa'");
    $stmt->bind_param('ssssssi', $title, $summary, $content, $image, $isTop, $slug, $id);
    if ($stmt->execute()) {
        $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Cập nhật bài viết thành công!'];
        header('Location: visa_services.php');
    } else {
        $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Không thể cập nhật bài viết.'];
    }
    $stmt->close();
    $conn->close();
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Chỉnh Sửa Bài Viết Visa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
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
                                            <h3>Chỉnh Sửa Bài Viết Visa</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> <a href="visa_services.php">Dịch Vụ Visa</a> <i class="fas fa-caret-right"></i> Chỉnh Sửa Bài Viết</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="edit_visa.php?id=<?php echo urlencode($id); ?>" method="POST">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="summary" class="form-label">Tóm Tắt</label>
                                            <textarea class="form-control" id="summary" name="summary" rows="4"><?php echo htmlspecialchars($news['summary'] ?? ''); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Nội Dung</label>
                                            <textarea class="form-control" id="content" name="content" rows="6" required><?php echo htmlspecialchars($news['content']); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">URL Hình Ảnh</label>
                                            <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($news['image'] ?? ''); ?>">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="isTop" name="isTop" <?php echo $news['isTop'] === 'true' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="isTop">Nổi Bật</label>
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