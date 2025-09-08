<?php
session_start(); // Start session
include '../config/db_connection.php';

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $stmt = $conn->prepare("DELETE FROM tour_bookings WHERE id = ?");
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        $_SESSION['flash_message'] = ['status' => 'success', 'message' => 'Xóa đặt tour thành công!'];
    } else {
        $_SESSION['flash_message'] = ['status' => 'danger', 'message' => 'Không thể xóa đặt tour.'];
    }
    $stmt->close();
    header('Location: tour_bookings.php'); // Clean URL
    $conn->close();
    exit;
}

// Số bản ghi hiển thị mỗi trang
$records_per_page = 10;

// Xác định trang hiện tại (nếu không có, mặc định là trang 1)
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
    $total_records_sql = "SELECT COUNT(*) AS total FROM tour_bookings WHERE full_name LIKE ? OR email LIKE ? OR tour_id LIKE ?";
    $stmt = $conn->prepare($total_records_sql);
    $search_param = '%' . $search_keyword . '%';
    $stmt->bind_param('sss', $search_param, $search_param, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();
    $total_records = $result->fetch_assoc()['total'];
    $stmt->close();

    $sql = "SELECT tb.*, t.title AS tour_title, h.hotel_name FROM tour_bookings tb JOIN tours t ON tb.tour_id = t.tour_id LEFT JOIN hotels h ON tb.hotel_id = h.hotel_id WHERE tb.full_name LIKE ? OR tb.email LIKE ? OR tb.tour_id LIKE ? ORDER BY tb.created_at DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssii', $search_param, $search_param, $search_param, $records_per_page, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
} else {
    $total_records_sql = "SELECT COUNT(*) AS total FROM tour_bookings";
    $result = $conn->query($total_records_sql);
    $total_records = $result->fetch_assoc()['total'];

    $sql = "SELECT tb.*, t.title AS tour_title, h.hotel_name FROM tour_bookings tb JOIN tours t ON tb.tour_id = t.tour_id LEFT JOIN hotels h ON tb.hotel_id = h.hotel_id ORDER BY tb.created_at DESC LIMIT $records_per_page OFFSET $offset";
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
    unset($_SESSION['flash_message']); // Clear after displaying
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Quản Lý Đặt Tour</title>
    <link rel="stylesheet" href="./css/bootstrap1.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/style1.css">
    <style>
        .table-responsive { margin-top: 20px; }
        .pagination { margin: 20px; }
        .page-item.active .page-link { background-color: #007bff; border-color: #007bff; }
        .page-link { color: #007bff; }
        .page-link:hover { color: #0056b3; }
        .notes-preview { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .switch { position: relative; display: inline-block; width: 50px; height: 24px; }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 34px; }
        .slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; }
        input:checked+.slider { background-color: #007bff; }
        input:checked+.slider:before { transform: translateX(26px); }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="crm_body_bg">
    <?php
    $currentPage = 'tour_bookings';
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
                                <img src="././img/client_img-1.png" alt="#">
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
                                            <h3>Quản Lý Đặt Tour</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="dashboard_breadcam text-end">
                                            <p><a href="../index.php">Dashboard</a> <i class="fas fa-caret-right"></i> Đặt Tour</p>
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
                                                        <input type="text" name="search_keyword" placeholder="Tìm kiếm theo tên, email, tour..." value="<?php echo htmlspecialchars($search_keyword); ?>">
                                                    </div>
                                                    <button type="submit">🔎<i class="ti-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th>STT</th>
                                                    <th>Tour</th>
                                                    <th>Họ Tên</th>
                                                    <th>Số Điện Thoại</th>
                                                    <th>Email</th>
                                                    <th>Ngày Khởi Hành</th>
                                                    <th>Số Người Lớn</th>
                                                    <th>Số Trẻ Em</th>
                                                    <th>Ghi Chú</th>
                                                    <th>Tổng Tiền</th>
                                                    <th>Khách Sạn</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    $stt = $offset + 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        $notes_preview = mb_substr(strip_tags($row['notes'] ?? ''), 0, 50, 'UTF-8') . (mb_strlen($row['notes'] ?? '', 'UTF-8') > 50 ? '...' : '');
                                                        echo "<tr class='text-center'>";
                                                        echo "<th scope='row'>" . $stt . "</th>";
                                                        echo "<td>" . htmlspecialchars($row['tour_title']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['departure_date']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['adult_quantity']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['child_quantity']) . "</td>";
                                                        echo "<td class='notes-preview'>" . htmlspecialchars($notes_preview) . "</td>";
                                                        echo "<td>" . number_format($row['total_amount'], 0, ',', '.') . " VNĐ</td>";
                                                        echo "<td>" . ($row['hotel_name'] ? htmlspecialchars($row['hotel_name']) : 'Chưa chọn') . "</td>";
                                                        echo "<td>
                                                                <form action='tour_bookings.php' method='POST' class='delete-form'>
                                                                    <input type='hidden' name='delete_id' value='" . htmlspecialchars($row['id']) . "'>
                                                                    <button type='button' class='btn btn-danger text-white btn-sm delete-btn'>
                                                                        <i class='fa-solid fa-trash'></i>
                                                                    </button>
                                                                </form>
                                                              </td>";
                                                        echo "</tr>";
                                                        $stt++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='12' class='text-center'>Không có đặt tour nào.</td></tr>";
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
        <script src="./js/popper1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./js/metisMenu.js"></script>
        <script src="./vendors/count_up/jquery.waypoints.min.js"></script>
        <script src="./vendors/chartlist/Chart.min.js"></script>
        <script src="./vendors/count_up/jquery.counterup.min.js"></script>
        <script src="./vendors/swiper_slider/js/swiper.min.js"></script>
        <script src="./vendors/niceselect/js/jquery.nice-select.min.js"></script>
        <script src="./vendors/owl_carousel/js/owl.carousel.min.js"></script>
        <script src="./vendors/gijgo/gijgo.min.js"></script>
        <script src="./vendors/datatable/js/jquery.dataTables.min.js"></script>
        <script src="./vendors/datatable/js/dataTables.responsive.min.js"></script>
        <script src="./vendors/datatable/js/dataTables.buttons.min.js"></script>
        <script src="./vendors/datatable/js/buttons.flash.min.js"></script>
        <script src="./vendors/datatable/js/jszip.min.js"></script>
        <script src="./vendors/datatable/js/pdfmake.min.js"></script>
        <script src="./vendors/datatable/js/vfs_fonts.js"></script>
        <script src="./vendors/datatable/js/buttons.php5.min.js"></script>
        <script src="./vendors/datatable/js/buttons.print.min.js"></script>
        <script src="./js/chart.min.js"></script>
        <script src="./vendors/progressbar/jquery.barfiller.js"></script>
        <script src="./vendors/tagsinput/tagsinput.js"></script>
        <script src="./vendors/text_editor/summernote-bs4.js"></script>
        <script src="./vendors/apex_chart/apexcharts.js"></script>
        <script src="./js/custom.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // SweetAlert2 for delete confirmation
                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        Swal.fire({
                            title: 'Bạn có chắc?',
                            text: 'Hành động này sẽ xóa đặt tour này vĩnh viễn!',
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

                // Manual alert dismissal
                document.querySelectorAll('.btn-close').forEach(button => {
                    button.addEventListener('click', function() {
                        const alert = this.closest('.alert');
                        if (alert) {
                            alert.remove();
                        }
                    });
                });
            });
        </script>
</body>
</html>