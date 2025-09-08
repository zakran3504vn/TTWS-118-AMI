<!-- PHP -->
<?php
include './config/db_connection.php';

$success_message = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $descriptions = $_POST['description'] ?? [];
    $stock_quantity = trim($_POST['stock_quantity'] ?? '');
    $product_features = trim($_POST['product_features'] ?? '');
    $outstanding_products = isset($_POST['outstanding_products']) ? 'true' : 'false';


    // Validate
    if (empty($name)) {
        $errors[] = "Tên bảng giá là bắt buộc.";
    }
    if (empty($price) || !is_numeric($price)) {
        $errors[] = "Giá bảng giá không hợp lệ.";
    }
    if (empty($descriptions) || !is_array($descriptions)) {
        $errors[] = "Mô tả bảng giá là bắt buộc.";
    }
    if (empty($stock_quantity) || !is_numeric($stock_quantity)) {
        $errors[] = "Số lượng không hợp lệ.";
    }
    if (empty($product_features) || !is_numeric($product_features)) {
        $errors[] = "Đơn giá không hợp lệ.";
    }

    // Convert description array -> JSON
    $description_json = json_encode($descriptions, JSON_UNESCAPED_UNICODE);

    // Lưu vào DB
    if (empty($errors)) {
        $sql = "INSERT INTO products (product_name, product_price, product_description, stock_quantity, product_features, outstanding_products) 
        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sdssss", $name, $price, $description_json, $stock_quantity, $product_features, $outstanding_products);

            if ($stmt->execute()) {
                $success_message = "Bảng giá mới đã được thêm thành công!";
            } else {
                $errors[] = "Lỗi khi thực thi truy vấn: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = "Lỗi chuẩn bị truy vấn: " . $conn->error;
        }
    }

    // Hiển thị thông báo
    if (!empty($errors)) {
        $error_message = implode('<br>', $errors);
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Thêm sản phẩm thất bại',
                    html: '" . addslashes($error_message) . "',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
    }

    if (!empty($success_message)) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: '" . addslashes($success_message) . "',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?current_page=products';
                    }
                });
            });
        </script>";
    }
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Thêm Bảng Giá</title>

    <link rel="icon" type="image/ico" href="https://truongthanhweb.com/wp-content/uploads/sites/208/2020/06/favicon.ico">
    <link rel="stylesheet" href="./css/bootstrap1.min.css" />
    <link rel="stylesheet" href="./vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="./vendors/swiper_slider/css/swiper.min.css" />
    <link rel="stylesheet" href="./vendors/select2/css/select2.min.css" />
    <link rel="stylesheet" href="./vendors/niceselect/css/nice-select.css" />
    <link rel="stylesheet" href="./vendors/owl_carousel/css/owl.carousel.css" />
    <link rel="stylesheet" href="./vendors/gijgo/gijgo.min.css" />
    <link rel="stylesheet" href="./vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="./vendors/tagsinput/tagsinput.css" />
    <link rel="stylesheet" href="./vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="./vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="./vendors/datatable/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="./vendors/text_editor/summernote-bs4.css" />
    <link rel="stylesheet" href="./vendors/morris/morris.css">
    <link rel="stylesheet" href="./vendors/material_icon/material-icons.css" />
    <link rel="stylesheet" href="./css/metisMenu.css">
    <link rel="stylesheet" href="./css/style1.css" />
    <link rel="stylesheet" href="./css/colors/default.css" id="colorSkinCSS">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH17CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .modal-dialog {
            max-width: 800px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body class="crm_body_bg">
    <?php
    $currentPage = 'products';
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
                                        <h5>
                                            <?php
                                            if (isset($_SESSION['fullname'])) {
                                                echo $_SESSION['fullname'];
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="../profile/index.php">Thông Tin Cá Nhân</a>
                                        <a href="#">Thêm Bảng Giá</a>
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
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <div class="table-responsive">
                                    <div class="container mt-5">
                                        <h2 class="text-center mb-4">Thêm Bảng Giá</h2>
                                        <form method="POST" class="p-4 border rounded shadow">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Tên sản phẩm</th>
                                                        <th scope="col">Giá sản phẩm</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Đơn giá</th>
                                                        <th scope="col">Sản phẩm nổi bật</th>
                                                        <th scope="col">Mô tả sản phẩm</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" id="name" name="name" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" id="price" name="price" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" id="product_features" name="product_features" required>
                                                        </td>
                                                        <td>
                                                            <div class="mb-3">
                                                                <label for="outstanding_products" class="form-label">Sản phẩm nổi bật:</label>
                                                                <div class="form-check form-switch">
                                                                    <input
                                                                        class="form-check-input"
                                                                        type="checkbox"
                                                                        id="outstanding_products"
                                                                        name="outstanding_products"
                                                                        value="true">
                                                                    <label class="form-check-label" for="outstanding_products">Bật / Tắt</label>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div id="description-container">
                                                                <?php
                                                                $descriptions = [];
                                                                if (!empty($product['product_description'])) {
                                                                    $decoded = json_decode($product['product_description'], true);
                                                                    if (is_array($decoded)) {
                                                                        $descriptions = $decoded;
                                                                    } else {
                                                                        $descriptions = explode("\n", $product['product_description']);
                                                                    }
                                                                }

                                                                if (!empty($descriptions)) {
                                                                    foreach ($descriptions as $desc) {
                                                                        echo '<div class="d-flex mb-2 description-row">
                                                                                <input type="text" class="form-control me-2" name="description[]" value="' . htmlspecialchars($desc) . '">
                                                                                <button type="button" class="btn btn-danger btn-sm remove-description">X</button>
                                                                            </div>';
                                                                    }
                                                                } else {
                                                                    echo '<div class="d-flex mb-2 description-row">
                                                                            <input type="text" class="form-control me-2" name="description[]" placeholder="Nhập mô tả...">
                                                                            <button type="button" class="btn btn-danger btn-sm remove-description">X</button>
                                                                        </div>';
                                                                }
                                                                ?>
                                                            </div>
                                                            <button type="button" class="btn btn-secondary btn-sm" id="add-description">+ Thêm dòng mô tả</button>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="mb-3 text-center">
                                                <input type="submit" class="btn btn-primary" value="Thêm sản phẩm">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('add-description').addEventListener('click', function() {
            const container = document.getElementById('description-container');
            const row = document.createElement('div');
            row.className = 'd-flex mb-2 description-row';
            row.innerHTML = `
                <input type="text" class="form-control me-2" name="description[]" placeholder="Nhập mô tả...">
                <button type="button" class="btn btn-danger btn-sm remove-description">X</button>
            `;
            container.appendChild(row);
        });

        // Uỷ quyền sự kiện xoá cho tất cả nút "X" (cả dòng có sẵn và dòng mới thêm)
        document.getElementById('description-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-description')) {
                e.target.parentElement.remove();
            }
        });
    </script>


    <script src="./js/jquery1-3.4.1.min.js"></script>
    <script src="./js/popper1.min.js"></script>
    <script src="./js/bootstrap1.min.js"></script>
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
    <script src="../js/chart.min.js"></script>
    <script src="../vendors/progressbar/jquery.barfiller.js"></script>
    <script src="../vendors/tagsinput/tagsinput.js"></script>
    <script src="../vendors/text_editor/summernote-bs4.js"></script>
    <script src="../vendors/apex_chart/apexcharts.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html> 