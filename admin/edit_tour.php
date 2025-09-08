<?php
session_start();
include '../config/db_connection.php';

// Get all hotels for checkboxes
$hotels = [];
$result = $conn->query("SELECT hotel_id, hotel_name FROM hotels ORDER BY hotel_name");
while ($row = $result->fetch_assoc()) {
    $hotels[] = $row;
}

// List of continents and transportation options
$continents = ['Châu Á', 'Châu Âu', 'Châu Mỹ', 'Châu Phi', 'Châu Úc'];
$transportations = ['Máy bay', 'Xe du lịch', 'Máy bay & Xe du lịch', 'Tàu hỏa'];

if (!isset($_GET['id'])) {
    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'ID tour không hợp lệ.'];
    header('Location: tours.php');
    $conn->close();
    exit;
}

$tour_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tours WHERE tour_id = ?");
$stmt->bind_param('i', $tour_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Tour không tồn tại.'];
    header('Location: tours.php');
    $stmt->close();
    $conn->close();
    exit;
}
$tour = $result->fetch_assoc();
$stmt->close();

// Get selected hotels for this tour
$selected_hotels = [];
$stmt = $conn->prepare("SELECT hotel_id FROM hotel_tour_mapping WHERE tour_id = ?");
$stmt->bind_param('i', $tour_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $selected_hotels[] = $row['hotel_id'];
}
$stmt->close();

// Parse existing images
$existing_images = !empty($tour['image_url']) ? json_decode($tour['image_url'], true) : [];
if (!is_array($existing_images)) {
    $existing_images = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $continent = trim($_POST['continent']);
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
    $transportation = in_array($_POST['transportation'], $transportations) ? $_POST['transportation'] : $transportations[0];
    $new_hotels = isset($_POST['hotels']) && is_array($_POST['hotels']) ? $_POST['hotels'] : [];
    $delete_images = isset($_POST['delete_images']) && is_array($_POST['delete_images']) ? $_POST['delete_images'] : [];

    // Handle file uploads
    $new_image_urls = [];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $max_file_size = 5 * 1024 * 1024; // 5MB
    $upload_dir = 'assets/img/';
    
    // Create upload directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
        $files = $_FILES['images'];
        $file_count = count($files['name']);
        
        for ($i = 0; $i < $file_count; $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $file_extension = strtolower(pathinfo($files['name'][$i], PATHINFO_EXTENSION));
                
                // Validate file
                if (!in_array($file_extension, $allowed_extensions)) {
                    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => "Hình ảnh {$files['name'][$i]}: Chỉ hỗ trợ định dạng JPG, JPEG, PNG."];
                    header('Location: edit_tour.php?id=' . urlencode($tour_id));
                    $conn->close();
                    exit;
                }
                if ($files['size'][$i] > $max_file_size) {
                    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => "Hình ảnh {$files['name'][$i]}: Kích thước file tối đa là 5MB."];
                    header('Location: edit_tour.php?id=' . urlencode($tour_id));
                    $conn->close();
                    exit;
                }

                // Generate unique filename
                $filename = "tour_{$tour_id}_" . uniqid() . '.' . $file_extension;
                $file_path = $upload_dir . $filename;
                if (!move_uploaded_file($files['tmp_name'][$i], $file_path)) {
                    $_SESSION['flash_message'] = ['status' => 'danger', 'message' => "Không thể tải lên hình ảnh {$files['name'][$i]}."];
                    header('Location: edit_tour.php?id=' . urlencode($tour_id));
                    $conn->close();
                    exit;
                }
                $new_image_urls[] = ['url' => "id.truongthanhweb.com/$file_path", 'file_path' => $file_path];
            }
        }
    }

    $conn->begin_transaction();
    try {
        // Filter out deleted images
        $remaining_images = array_values(array_filter($existing_images, function($image_url) use ($delete_images) {
            return !in_array($image_url, $delete_images);
        }));

        // Delete files for removed images
        foreach ($delete_images as $image_url) {
            $file_path = str_replace('id.truongthanhweb.com/', '', $image_url);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // Combine remaining and new images
        $all_images = array_merge($remaining_images, array_column($new_image_urls, 'url'));

        // Update tour
        $image_url_json = json_encode($all_images);
        $stmt = $conn->prepare("UPDATE tours SET title = ?, continent = ?, image_url = ?, departure_location = ?, destination = ?, duration_days = ?, duration_nights = ?, regular_price = ?, sale_price = ?, adult_price = ?, child_price = ?, itinerary = ?, slug = ?, status = ?, transportation = ?, description = ?, updated_at = NOW() WHERE tour_id = ?");
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
        $slug = trim($slug, '-');
        $stmt->bind_param('sssssiiddiddssssi', $title, $continent, $image_url_json, $departure_location, $destination, $duration_days, $duration_nights, $regular_price, $sale_price, $adult_price, $child_price, $itinerary, $slug, $status, $transportation, $description, $tour_id);
        if (!$stmt->execute()) {
            throw new Exception('Không thể cập nhật tour.');
        }
        $stmt->close();

        // Delete existing hotel mappings
        $stmt = $conn->prepare("DELETE FROM hotel_tour_mapping WHERE tour_id = ?");
        $stmt->bind_param('i', $tour_id);
        $stmt->execute();
        $stmt->close();

        // Insert new hotel mappings
        foreach ($new_hotels as $hotel_id) {
            $stmt = $conn->prepare("INSERT INTO hotel_tour_mapping (tour_id, hotel_id) VALUES (?, ?)");
            $stmt->bind_param('ii', $tour_id, $hotel_id);
            if (!$stmt->execute()) {
                throw new Exception('Không thể liên kết khách sạn.');
            }
            $stmt->close();
        }

        $conn->commit();
        $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Cập nhật tour thành công!'];
        header('Location: tours.php');
    } catch (Exception $e) {
        $conn->rollback();
        // Delete newly uploaded files if transaction fails
        foreach ($new_image_urls as $img) {
            if (file_exists($img['file_path'])) {
                unlink($img['file_path']);
            }
        }
        $_SESSION['flash_message'] = ['status' => 'danger', 'message' => $e->getMessage()];
        header('Location: edit_tour.php?id=' . urlencode($tour_id));
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
    <title>Chỉnh Sửa Tour Du Lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
    <style>
        .current-image {
            max-width: 100px;
            margin-bottom: 10px;
        }
        .image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .image-preview-item {
            position: relative;
        }
        .image-preview-item img {
            max-width: 100px;
            height: auto;
        }
        .image-preview-item .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .hotel-list {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
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
                                            <h3>Chỉnh Sửa Tour Du Lịch</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> <a href="tours.php">Tours</a> <i class="fas fa-caret-right"></i> Chỉnh Sửa Tour</p>
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
                                    <form action="edit_tour.php?id=<?php echo urlencode($tour_id); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($tour['title']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="continent" class="form-label">Châu Lục</label>
                                            <select class="form-control" id="continent" name="continent" required>
                                                <?php foreach ($continents as $continent): ?>
                                                    <option value="<?php echo htmlspecialchars($continent); ?>" <?php echo $tour['continent'] === $continent ? 'selected' : ''; ?>><?php echo htmlspecialchars($continent); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hình Ảnh Hiện Tại</label>
                                            <div class="image-preview">
                                                <?php foreach ($existing_images as $index => $image_url): ?>
                                                    <div class="image-preview-item">
                                                        <img src="<?php echo htmlspecialchars($image_url); ?>" class="current-image" alt="Tour Image">
                                                        <input type="checkbox" name="delete_images[]" value="<?php echo htmlspecialchars($image_url); ?>" id="delete_image_<?php echo $index; ?>">
                                                        <label for="delete_image_<?php echo $index; ?>" class="delete-btn">X</label>
                                                        <p><?php echo htmlspecialchars(basename($image_url)); ?><?php echo $index === 0 ? ' (Hình ảnh chính)' : ''; ?></p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="images" class="form-label">Thêm Hình Ảnh Mới (JPG, JPEG, PNG, tối đa 5MB, chọn nhiều file)</label>
                                            <input type="file" class="form-control" id="images" name="images[]" accept=".jpg,.jpeg,.png" multiple>
                                            <small class="form-text text-muted">Hình ảnh mới sẽ được thêm vào danh sách. Hình ảnh đầu tiên trong danh sách là hình ảnh chính.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="departure_location" class="form-label">Điểm Khởi Hành</label>
                                            <input type="text" class="form-control" id="departure_location" name="departure_location" value="<?php echo htmlspecialchars($tour['departure_location']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="destination" class="form-label">Điểm Đến</label>
                                            <input type="text" class="form-control" id="destination" name="destination" value="<?php echo htmlspecialchars($tour['destination']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="duration_days" class="form-label">Số Ngày</label>
                                            <input type="number" class="form-control" id="duration_days" name="duration_days" value="<?php echo htmlspecialchars($tour['duration_days']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="duration_nights" class="form-label">Số Đêm</label>
                                            <input type="number" class="form-control" id="duration_nights" name="duration_nights" value="<?php echo htmlspecialchars($tour['duration_nights']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="regular_price" class="form-label">Giá Thường (VNĐ)</label>
                                            <input type="number" class="form-control" id="regular_price" name="regular_price" step="1000" value="<?php echo htmlspecialchars($tour['regular_price']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sale_price" class="form-label">Giá Khuyến Mãi (VNĐ)</label>
                                            <input type="number" class="form-control" id="sale_price" name="sale_price" step="1000" value="<?php echo htmlspecialchars($tour['sale_price']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="adult_price" class="form-label">Giá Người Lớn (VNĐ)</label>
                                            <input type="number" class="form-control" id="adult_price" name="adult_price" step="1000" value="<?php echo htmlspecialchars($tour['adult_price']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="child_price" class="form-label">Giá Trẻ Em (VNĐ)</label>
                                            <input type="number" class="form-control" id="child_price" name="child_price" step="1000" value="<?php echo htmlspecialchars($tour['child_price']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="itinerary" class="form-label">Lịch Trình</label>
                                            <textarea class="form-control" id="itinerary" name="itinerary" rows="6"><?php echo htmlspecialchars($tour['itinerary']); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô Tả</label>
                                            <textarea class="form-control" id="description" name="description" rows="4"><?php echo htmlspecialchars($tour['description']); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Khách Sạn</label>
                                            <div class="hotel-list">
                                                <?php foreach ($hotels as $hotel): ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="hotels[]" value="<?php echo htmlspecialchars($hotel['hotel_id']); ?>" id="hotel_<?php echo htmlspecialchars($hotel['hotel_id']); ?>" <?php echo in_array($hotel['hotel_id'], $selected_hotels) ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="hotel_<?php echo htmlspecialchars($hotel['hotel_id']); ?>">
                                                            <?php echo htmlspecialchars($hotel['hotel_name']); ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Trạng Thái</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="active" <?php echo $tour['status'] === 'active' ? 'selected' : ''; ?>>Kích Hoạt</option>
                                                <option value="inactive" <?php echo $tour['status'] === 'inactive' ? 'selected' : ''; ?>>Không Kích Hoạt</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="transportation" class="form-label">Phương Tiện</label>
                                            <select class="form-control" id="transportation" name="transportation" required>
                                                <?php foreach ($transportations as $transport): ?>
                                                    <option value="<?php echo htmlspecialchars($transport); ?>" <?php echo $tour['transportation'] === $transport ? 'selected' : ''; ?>><?php echo htmlspecialchars($transport); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
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