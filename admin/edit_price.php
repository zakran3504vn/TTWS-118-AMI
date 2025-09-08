<!-- PHP -->
<?php
include './config/db_connection.php';

// Lấy tin tức để chỉnh sửa
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$product = [];
if (isset($product_id)) {
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    // var_dump($product['product_description']);
    // var_dump($product);
    // die;
}

// Xử lý upload ảnh từ CKEditor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['upload_image'])) {
    header('Content-Type: application/json');
    $img_path = './assets/img/' . $_SESSION['username'] . '/';
    $img_url_base = 'https://id.truongthanhweb.com/admin/assets/img/' . $_SESSION['username'] . '/';
    $max_file_size = 3 * 1024 * 1024;

    if (!is_dir($img_path)) {
        mkdir($img_path, 0777, true);
    }

    if (!empty($_FILES['upload']['name'])) {
        $tmp_name = $_FILES['upload']['tmp_name'];
        $name = $_FILES['upload']['name'];
        $error = $_FILES['upload']['error'];
        $size = $_FILES['upload']['size'];

        if ($error === UPLOAD_ERR_OK && $size <= $max_file_size) {
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff'];

            if (in_array($ext, $allowed_types)) {
                $file_name = uniqid() . '.' . $ext;
                $dest = $img_path . $file_name;
                $full_url = $img_url_base . $file_name;

                if (move_uploaded_file($tmp_name, $dest)) {
                    echo json_encode([
                        "uploaded" => 1,
                        "fileName" => $file_name,
                        "url" => $full_url
                    ]);
                } else {
                    echo json_encode([
                        "uploaded" => 0,
                        "error" => ["message" => "Không thể di chuyển file đến thư mục đích."]
                    ]);
                }
                exit;
            }
        }
    }

    echo json_encode([
        "uploaded" => 0,
        "error" => ["message" => "Upload thất bại. Vui lòng kiểm tra lại kích thước và định dạng file."]
    ]);
    exit;
}

// Xử lý cập nhật bảng giá
$success_message = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['upload_image'])) {
    $product_name = trim($_POST['product_name'] ?? '');
    $product_description = trim($_POST['product_description'] ?? '');
    $product_price = floatval(trim($_POST['product_price'] ?? 0));
    $outstanding_products = isset($_POST['outstanding_products']) ? 'true' : 'false';
    $stock_quantity   = intval(trim($_POST['stock_quantity'] ?? 0));
    $product_features = floatval(trim($_POST['product_features'] ?? 0));




    $descriptions = $_POST['description'] ?? [];
    $product_description = json_encode($descriptions, JSON_UNESCAPED_UNICODE);
    if (empty($product_name)) $errors[] = "Tên Bảng giá là bắt buộc.";
    if (empty($product_description)) $errors[] = "Nội dung là bắt buộc.";
    if (empty($product_price)) $errors[] = "Giá Bảng giá là bắt buộc.";
    if (empty($stock_quantity)) $errors[] = "Số lượng không hợp lệ.";
    if (empty($product_features)) $errors[] = "Đơn giá không hợp lệ.";

    if (empty($errors)) {
        $sql = "UPDATE products 
        SET product_name = ?, 
            product_description = ?, 
            product_price = ?,
            stock_quantity = ?,
            product_features = ?,
            outstanding_products = ?,
            update_at = NOW() 
        WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Kiểu dữ liệu lần lượt: s,s,d,i,d,s,i
            $stmt->bind_param(
                "ssdidsi",
                $product_name,
                $product_description,
                $product_price,
                $stock_quantity,
                $product_features,
                $outstanding_products,
                $product_id
            );



            if ($stmt->execute()) {
                $success_message = "Bảng giá đã được cập nhật thành công!";
            } else {
                $errors[] = "Lỗi khi thực thi truy vấn: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = "Lỗi chuẩn bị truy vấn: " . $conn->error;
        }
    }

    if (!empty($errors)) {
        $error_message = implode('<br>', $errors);
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Cập nhật thất bại',
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
                        window.location.href = '?current_page=product_detail&id=" . $product_id . "';
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
    <title>Chỉnh Sửa Bảng giá</title>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/decoupled-document/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .modal-dialog {
            max-width: 800px;
        }

        .ck-content {
            font-weight: 600;
            /* chữ mặc định đậm hơn */
            font-size: 16px;
            /* có thể chỉnh thêm kích thước */
            line-height: 1.6;
            /* dễ đọc hơn */
        }

        #toolbar-container {
            border: 1px solid #ccc;
            border-bottom: none;
            padding: 10px;
        }

        #editor-container {
            height: 400px;
            border: 1px solid #ccc;
            padding: 20px;
        }
    </style>
</head>

<body class="crm_body_bg">
    <?php $currentPage = 'tintuc';
    include('./includes/sidebar.php'); ?>
    <section class="main_content dashboard_part">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none"><i class="ti-menu"></i></div>
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
                                        <a href="#">Chỉnh Sửa Bảng giá</a>
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
                                        <h2 class="text-center mb-4">Chỉnh Sửa Bảng giá</h2>
                                        <form method="POST" class="p-4 border rounded shadow" enctype="multipart/form-data">
                                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                            <div class="mb-3">
                                                <label for="product_name" class="form-label">Tên Bảng giá:</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['product_name'] ?? ''); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="product_price" class="form-label">Giá:</label>
                                                <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo htmlspecialchars($product['product_price'] ?? ''); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="stock_quantity" class="form-label">Số lượng:</label>
                                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                                                    value="<?php echo htmlspecialchars($product['stock_quantity'] ?? 0); ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="product_features" class="form-label">Đơn giá:</label>
                                                <input type="number" step="0.01" class="form-control" id="product_features" name="product_features"
                                                    value="<?php echo htmlspecialchars($product['product_features'] ?? 0); ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="outstanding_products" class="form-label">Sản phẩm nổi bật:</label>
                                                <div class="form-check form-switch">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        id="outstanding_products"
                                                        name="outstanding_products"
                                                        value="true"
                                                        <?php echo ($product['outstanding_products'] === 'true') ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="outstanding_products">Bật / Tắt</label>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Mô tả Bảng giá:</label>
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
                                                <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-description">+ Thêm dòng mô tả</button>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="update_news">Cập Nhật</button>
                                            <a href="?current_page=news" class="btn btn-secondary">Danh Sách Tin Tức</a>
                                        </form>
                                    </div>
                                    <script>
                                        DecoupledEditor
                                            .create(document.querySelector('#editor-container'), {
                                                toolbar: ['heading', '|', 'fontSize', 'fontFamily', '|', 'fontColor', 'fontBackgroundColor', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'alignment', '|', 'numberedList', 'bulletedList', '|', 'indent', 'outdent', '|', 'link', 'blockQuote', 'insertTable', '|', 'imageUpload', '|', 'undo', 'redo'],
                                                language: 'vi',
                                                image: {
                                                    toolbar: ['imageTextAlternative', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side']
                                                },
                                                table: {
                                                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                                                }
                                            })
                                            .then(editor => {
                                                const toolbarContainer = document.querySelector('#toolbar-container');
                                                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                                                editor.setData(<?php echo json_encode(htmlspecialchars_decode($product['product_description'] ?? '')); ?>);
                                                editor.model.document.on('change:data', () => {
                                                    const content = editor.getData();
                                                    const textarea = document.querySelector('#product_description');
                                                    if (textarea) textarea.value = content;
                                                });

                                                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => ({
                                                    upload: () => new Promise((resolve, reject) => {
                                                        const data = new FormData();
                                                        loader.file.then(file => {
                                                            data.append('upload', file);
                                                            fetch('?current_page=edit_product&upload_image=1', {
                                                                    method: 'POST',
                                                                    body: data
                                                                })
                                                                .then(response => response.json())
                                                                .then(response => response.uploaded ? resolve({
                                                                    default: response.url
                                                                }) : reject(response.error.message || 'Lỗi không xác định'))
                                                                .catch(error => {
                                                                    console.error('Upload error:', error);
                                                                    reject('Lỗi khi upload ảnh!');
                                                                });
                                                        });
                                                    })
                                                });
                                            })
                                            .catch(error => console.error(error));
                                    </script>
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

        // Sự kiện xoá (uỷ quyền event cho container để áp dụng cho cả input mới thêm)
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