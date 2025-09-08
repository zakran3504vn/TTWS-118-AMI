<?php
session_start();
include '../config/db_connection.php';

// List of categories excluding 'Visa'
$categories = ['Tin tức mới nhất', 'Cẩm nang du lịch', 'Khuyến mãi']; // Adjust based on your enum values

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $summary = trim($_POST['summary']);
    $content = trim($_POST['content']);
    $category = in_array($_POST['category'], $categories) ? $_POST['category'] : $categories[0];
    $image = trim($_POST['image']);
    $isTop = isset($_POST['isTop']) ? 'true' : 'false';

    // Generate slug from title
    $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
    $slug = trim($slug, '-');

    $stmt = $conn->prepare("INSERT INTO news (title, summary, content, category, image, isTop, slug) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $title, $summary, $content, $category, $image, $isTop, $slug);
    if ($stmt->execute()) {
        $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Thêm bài viết thành công!'];
        header('Location: other_news.php');
    } else {
        $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Không thể thêm bài viết.'];
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
    <title>Thêm Bài Viết Tin Tức</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body class="crm_body_bg">
    <?php
    $currentPage = 'other_news';
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
                                            <h3>Thêm Bài Viết Tin Tức</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> <a href="other_news.php">Tin Tức</a> <i class="fas fa-caret-right"></i> Thêm Bài Viết</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="add_news.php" method="POST">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="summary" class="form-label">Tóm Tắt</label>
                                            <textarea class="form-control" id="summary" name="summary" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Nội Dung</label>
                                            <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Danh Mục</label>
                                            <select class="form-control" id="category" name="category" required>
                                                <?php foreach ($categories as $cat): ?>
                                                    <option value="<?php echo htmlspecialchars($cat); ?>"><?php echo htmlspecialchars($cat); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">URL Hình Ảnh</label>
                                            <input type="text" class="form-control" id="image" name="image">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="isTop" name="isTop">
                                            <label class="form-check-label" for="isTop">Nổi Bật</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm Bài Viết</button>
                                        <a href="other_news.php" class="btn btn-secondary">Hủy</a>
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