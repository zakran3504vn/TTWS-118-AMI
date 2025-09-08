<?php
session_start();
include '../config/db_connection.php';

// Get all hotels for multi-select
$hotels = [];
$result = $conn->query("SELECT hotel_id, hotel_name FROM hotels ORDER BY hotel_name");
while ($row = $result->fetch_assoc()) {
    $hotels[] = $row;
}

// List of continents and transportation options
$continents = ['Châu Á', 'Châu Âu', 'Châu Mỹ', 'Châu Phi', 'Châu Úc']; // Adjust as needed
$transportations = ['Máy bay', 'Xe du lịch', 'Máy bay & Xe du lịch', 'Tàu hỏa'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $continent = trim($_POST['continent']);
    $image_url = trim($_POST['image_url']);
    $departure_location = trim($_POST['departure_location']);
    $destination = trim($_POST['destination']);
    $duration_days = intval($_POST['duration_days']);
    $duration_nights = intval($_POST['duration_nights']);
    $regular_price = floatval($_POST['regular_price']);
    $sale_price = floatval($_POST['sale_price']);
    $adult_price = floatval($_POST['adult_price']);
    $child_price = floatval($_POST['child_price']);
    $itinerary = trim($_POST['itinerary']);
    $description = trim($_POST['description']);
    $status = in_array($_POST['status'], ['active', 'inactive']) ? $_POST['status'] : 'active';
    $status = isset($_POST['status']) ? 'true' : 'false';
    $transportation = in_array($_POST['transportation'], $transportations) ? $_POST['transportation'] : $transportations[0];
    $selected_hotels = isset($_POST['hotels']) && is_array($_POST['hotels']) ? $_POST['hotels'] : [];

    // Generate slug from title
    $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
    $slug = trim($slug, '-');

    $conn->begin_transaction();
    try {
        // Insert tour
        $stmt = $conn->prepare("INSERT INTO tours (title, continent, image_url, departure_location, destination, duration_days, duration_nights, regular_price, sale_price, adult_price, child_price, itinerary, slug, status, status, transportation, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssiiddiddsssss', $title, $continent, $image_url, $departure_location, $destination, $duration_days, $duration_nights, $regular_price, $sale_price, $adult_price, $child_price, $itinerary, $slug, $status, $status, $transportation, $description);
        if (!$stmt->execute()) {
            throw new Exception('Không thể thêm tour.');
        }
        $tour_id = $conn->insert_id;
        $stmt->close();

        // Insert hotel mappings
        foreach ($selected_hotels as $hotel_id) {
            $stmt = $conn->prepare("INSERT INTO hotel_tour_mapping (tour_id, hotel_id) VALUES (?, ?)");
            $stmt->bind_param('ii', $tour_id, $hotel_id);
            if (!$stmt->execute()) {
                throw new Exception('Không thể liên kết khách sạn.');
            }
            $stmt->close();
        }

        $conn->commit();
        $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Thêm tour thành công!'];
        header('Location: tours.php');
    } catch (Exception $e) {
        $conn->rollback();
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
    <title>Thêm Tour Du Lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body class="crm_body_bg">
    <?php
    $currentPage = 'tours';
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
                                            <h3>Thêm Tour Du Lịch</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> <a href="tours.php">Tours</a> <i class="fas fa-caret-right"></i> Thêm Tour</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="add_tour.php" method="POST">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="continent" class="form-label">Châu Lục</label>
                                            <select class="form-control" id="continent" name="continent" required>
                                                <?php foreach ($continents as $continent): ?>
                                                    <option value="<?php echo htmlspecialchars($continent); ?>"><?php echo htmlspecialchars($continent); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image_url" class="form-label">URL Hình Ảnh</label>
                                            <input type="text" class="form-control" id="image_url" name="image_url" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="departure_location" class="form-label">Điểm Khởi Hành</label>
                                            <input type="text" class="form-control" id="departure_location" name="departure_location" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="destination" class="form-label">Điểm Đến</label>
                                            <input type="text" class="form-control" id="destination" name="destination" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="duration_days" class="form-label">Số Ngày</label>
                                            <input type="number" class="form-control" id="duration_days" name="duration_days" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="duration_nights" class="form-label">Số Đêm</label>
                                            <input type="number" class="form-control" id="duration_nights" name="duration_nights" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="regular_price" class="form-label">Giá Thường (VNĐ)</label>
                                            <input type="number" class="form-control" id="regular_price" name="regular_price" step="1000" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sale_price" class="form-label">Giá Khuyến Mãi (VNĐ)</label>
                                            <input type="number" class="form-control" id="sale_price" name="sale_price" step="1000" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="adult_price" class="form-label">Giá Người Lớn (VNĐ)</label>
                                            <input type="number" class="form-control" id="adult_price" name="adult_price" step="1000" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="child_price" class="form-label">Giá Trẻ Em (VNĐ)</label>
                                            <input type="number" class="form-control" id="child_price" name="child_price" step="1000" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="itinerary" class="form-label">Lịch Trình</label>
                                            <textarea class="form-control" id="itinerary" name="itinerary" rows="6"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô Tả</label>
                                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="hotels" class="form-label">Khách Sạn</label>
                                            <select class="form-control" id="hotels" name="hotels[]" multiple>
                                                <?php foreach ($hotels as $hotel): ?>
                                                    <option value="<?php echo htmlspecialchars($hotel['hotel_id']); ?>"><?php echo htmlspecialchars($hotel['hotel_name']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Trạng Thái</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="active">Kích Hoạt</option>
                                                <option value="inactive">Không Kích Hoạt</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="transportation" class="form-label">Phương Tiện</label>
                                            <select class="form-control" id="transportation" name="transportation" required>
                                                <?php foreach ($transportations as $transport): ?>
                                                    <option value="<?php echo htmlspecialchars($transport); ?>"><?php echo htmlspecialchars($transport); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status">
                                            <label class="form-check-label" for="status">Nổi Bật</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm Tour</button>
                                        <a href="tours.php" class="btn btn-secondary">Hủy</a>
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