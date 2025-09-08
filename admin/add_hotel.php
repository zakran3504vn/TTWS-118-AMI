<?php
session_start();
include '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel_name = trim($_POST['hotel_name']);
    $hotel_img = trim($_POST['hotel_img']);
    $hotel_location = trim($_POST['hotel_location']);

    try {
        $stmt = $conn->prepare("INSERT INTO hotels (hotel_name, hotel_img, hotel_location) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $hotel_name, $hotel_img, $hotel_location);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Thêm khách sạn thành công!'];
            header('Location: hotels.php');
        } else {
            throw new Exception('Không thể thêm khách sạn.');
        }
        $stmt->close();
    } catch (Exception $e) {
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
    <title>Thêm Khách Sạn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body class="crm_body_bg">
    <?php
    $currentPage = 'hotels';
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
                                            <h3>Thêm Khách Sạn</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> <a href="hotels.php">Hotels</a> <i class="fas fa-caret-right"></i> Thêm Khách Sạn</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="add_hotel.php" method="POST">
                                        <div class="mb-3">
                                            <label for="hotel_name" class="form-label">Tên Khách Sạn</label>
                                            <input type="text" class="form-control" id="hotel_name" name="hotel_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hotel_img" class="form-label">URL Hình Ảnh</label>
                                            <input type="text" class="form-control" id="hotel_img" name="hotel_img">
                                        </div>
                                        <div class="mb-3">
                                            <label for="hotel_location" class="form-label">Vị Trí</label>
                                            <textarea class="form-control" id="hotel_location" name="hotel_location" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm Khách Sạn</button>
                                        <a href="hotels.php" class="btn btn-secondary">Hủy</a>
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