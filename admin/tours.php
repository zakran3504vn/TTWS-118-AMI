<?php
session_start();
include '../config/db_connection.php';

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $tour_id = $_POST['delete_id'];
    $conn->begin_transaction();
    try {
        // Delete hotel mappings
        $stmt = $conn->prepare("DELETE FROM hotel_tour_mapping WHERE tour_id = ?");
        $stmt->bind_param('i', $tour_id);
        $stmt->execute();
        $stmt->close();

        // Delete tour
        $stmt = $conn->prepare("DELETE FROM tours WHERE tour_id = ?");
        $stmt->bind_param('i', $tour_id);
        if ($stmt->execute()) {
            $conn->commit();
            $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Xóa tour thành công!'];
        } else {
            throw new Exception('Không thể xóa tour.');
        }
        $stmt->close();
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['flash_message'] = ['status' => 'danger', 'message' => $e->getMessage()];
    }
    header('Location: tours.php');
    $conn->close();
    exit;
}

// Số bản ghi hiển thị mỗi trang
$records_per_page = 10;

// Xác định trang hiện tại
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Tính toán giá trị OFFSET
$offset = ($current_page - 1) * $records_per_page;

// Kiểm tra từ khóa tìm kiếm
$search_keyword = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search_keyword'])) {
    $search_keyword = trim($_POST['search_keyword']);
}

// Lấy tổng số bản ghi
if (!empty($search_keyword)) {
    $total_records_sql = "SELECT COUNT(*) AS total FROM tours WHERE title LIKE ? OR destination LIKE ?";
    $stmt = $conn->prepare($total_records_sql);
    $search_param = '%' . $search_keyword . '%';
    $stmt->bind_param('ss', $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
    $total_records = $result->fetch_assoc()['total'];
    $stmt->close();

    $sql = "SELECT t.*, GROUP_CONCAT(h.hotel_name) AS hotels 
            FROM tours t 
            LEFT JOIN hotel_tour_mapping htm ON t.tour_id = htm.tour_id 
            LEFT JOIN hotels h ON htm.hotel_id = h.hotel_id 
            WHERE t.title LIKE ? OR t.destination LIKE ? 
            GROUP BY t.tour_id 
            ORDER BY t.created_at DESC 
            LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssii', $search_param, $search_param, $records_per_page, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
} else {
    $total_records_sql = "SELECT COUNT(*) AS total FROM tours";
    $result = $conn->query($total_records_sql);
    $total_records = $result->fetch_assoc()['total'];

    $sql = "SELECT t.*, GROUP_CONCAT(h.hotel_name) AS hotels 
            FROM tours t 
            LEFT JOIN hotel_tour_mapping htm ON t.tour_id = htm.tour_id 
            LEFT JOIN hotels h ON htm.hotel_id = h.hotel_id 
            GROUP BY t.tour_id 
            ORDER BY t.created_at DESC 
            LIMIT $records_per_page OFFSET $offset";
    $result = $conn->query($sql);
}

// Tính tổng số trang
$total_pages = ceil($total_records / $records_per_page);

// Handle flash message
$message = '';
$status = '';
if (isset($_SESSION['flash_message'])) {
    $message = htmlspecialchars($_SESSION['flash_message']['message']);
    $status = $_SESSION['flash_message']['status'];
    unset($_SESSION['flash_message']);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Quản Lý Tour Du Lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
    <style>
        .table-responsive {
            margin-top: 20px;
        }
        .pagination {
            margin: 20px;
        }
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .page-link {
            color: #007bff;
        }
        .page-link:hover {
            color: #0056b3;
        }
        .thumbnail {
            max-width: 50px;
            max-height: 50px;
        }
        .hotels-column {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="crm_body_bg">
    <?php
    $currentPage = 'tours';
    include('./includes/sidebar.php');
    ?>
    <section class="main_content dashboard_part">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner"></div>
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
        </div>
        <div class="main_content_iner">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="dashboard_header mb_50">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dashboard_header_title">
                                        <h3>Quản Lý Tour Du Lịch</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="dashboard_breadcam text-end">
                                        <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> Tours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php if ($message): ?>
                            <div class="alert alert-<?php echo $status; ?> alert-dismissible fade show" role="alert">
                                <?php echo $message; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form action="" method="POST">
                                                <div class="search_field">
                                                    <input type="text" name="search_keyword" placeholder="Tìm kiếm theo tiêu đề, điểm đến..." value="<?php echo htmlspecialchars($search_keyword); ?>">
                                                </div>
                                                <button type="submit">🔎<i class="ti-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="add_tour.php" class="btn_1">THÊM TOUR</a>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th>STT</th>
                                                <th>Tiêu Đề</th>
                                                <th>Châu Lục</th>
                                                <th>Điểm Đến</th>
                                                <th>Thời Gian</th>
                                                <th>Giá Người Lớn</th>
                                                <th>Khách Sạn</th>
                                                <th>Trạng Thái</th>
                                                <th>Ngày Tạo</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                $stt = $offset + 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    $duration = $row['duration_days'] . ' ngày ' . $row['duration_nights'] . ' đêm';
                                                    $hotels = $row['hotels'] ? htmlspecialchars($row['hotels']) : 'Chưa có';
                                                    $status_text = $row['status'] === 'active' ? 'Kích Hoạt' : 'Không Kích Hoạt';
                                                    echo "<tr class='text-center'>";
                                                    echo "<th scope='row'>" . $stt . "</th>";
                                                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['continent']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['destination']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($duration) . "</td>";
                                                    echo "<td>" . number_format($row['adult_price'], 0, ',', '.') . "</td>";
                                                    echo "<td class='hotels-column'>" . $hotels . "</td>";
                                                    echo "<td>" . $status_text . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                                                    echo "<td>
                                                        <a href='edit_tour.php?id=" . urlencode($row['tour_id']) . "' class='btn btn-primary text-white btn-sm'>
                                                            <i class='fa-solid fa-pen-to-square'></i>
                                                        </a>
                                                        <form action='tours.php' method='POST' class='delete-form d-inline'>
                                                            <input type='hidden' name='delete_id' value='" . htmlspecialchars($row['tour_id']) . "'>
                                                            <button type='button' class='btn btn-danger text-white btn-sm delete-btn'>
                                                                <i class='fa-solid fa-trash'></i>
                                                            </button>
                                                        </form>
                                                    </td>";
                                                    echo "</tr>";
                                                    $stt++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='10' class='text-center'>Không có tour nào.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="pagination">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-center">
                                                <?php if ($current_page > 1): ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>&search_keyword=<?php echo urlencode($search_keyword); ?>">« Trước</a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                                                    <li class="page-item <?php echo ($page == $current_page) ? 'active' : ''; ?>">
                                                        <a class="page-link" href="?page=<?php echo $page; ?>&search_keyword=<?php echo urlencode($search_keyword); ?>"><?php echo $page; ?></a>
                                                    </li>
                                                <?php endfor; ?>
                                                <?php if ($current_page < $total_pages): ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>&search_keyword=<?php echo urlencode($search_keyword); ?>">Sau »</a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                Swal.fire({
                    title: 'Bạn có chắc?',
                    text: 'Hành động này sẽ xóa tour này vĩnh viễn!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('.delete-form').submit();
                    }
                });
            });
        });
    });
    </script>
</body>
</html>