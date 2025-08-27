<?php
// Hàm lấy ra sản phẩm mới nhất
function getLatestProducts($conn, $limit = 4) {
    // Khởi tạo mảng kết quả
    $result = array();

    // Câu truy vấn SQL để lấy sản phẩm mới nhất
    $query = "SELECT * FROM products ORDER BY create_at DESC LIMIT ?";
    
    // Chuẩn bị truy vấn
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $resultSet = $stmt->get_result();
    
    // Lấy dữ liệu
    while ($row = $resultSet->fetch_assoc()) {
        $result[] = $row;
    }
    
    // Đóng statement
    $stmt->close();
    
    // Trả về kết quả
    return $result;
}

//Hàm lấy danh sách sản phẩm
function getAllDataProducts($conn) {
    // Khởi tạo biến kết quả
    $result = array();
    
    // Câu truy vấn SQL để lấy tất cả dữ liệu từ bảng products
    $query = "SELECT * FROM products";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $result;
}

//Hàm lấy phân trang sản phẩm
function getPaginatedProducts($conn, $page = 1, $perPage = 10) {
    // Đảm bảo page là số dương
    $page = max(1, (int)$page);
    
    // Tính offset
    $offset = ($page - 1) * $perPage;
    
    // Đếm tổng số sản phẩm
    $totalQuery = "SELECT COUNT(*) as total FROM products";
    $totalResult = $conn->query($totalQuery);
    $totalRow = $totalResult->fetch_assoc();
    $totalProducts = $totalRow['total'];
    
    // Tính tổng số trang
    $totalPages = ceil($totalProducts / $perPage);
    
    // Truy vấn lấy sản phẩm theo trang
    $query = "SELECT * FROM products LIMIT $perPage OFFSET $offset";
    $stmt = $conn->query($query);
    
    // Lấy dữ liệu sản phẩm
    $products = array();
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        $products = array('error' => 'Không thể lấy dữ liệu: ' . $conn->error);
    }
    
    // Trả về kết quả
    return array(
        'products' => $products,
        'current_page' => $page,
        'total_pages' => $totalPages,
        'per_page' => $perPage,
        'total_products' => $totalProducts
    );
}

//Hàm lấy danh sách danh mục
function getAllCategories($conn) {
    // Khởi tạo mảng kết quả
    $categories = array();
    
    // Câu truy vấn SQL để lấy tất cả danh mục
    $query = "SELECT * FROM category";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $categories[] = $row; // Thêm từng danh mục vào mảng
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $categories = array('error' => 'Không thể lấy dữ liệu từ bảng category: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $categories;
}

//Hàm lấy danh sách thương hiệu
function getAllBrands($conn) {
    // Khởi tạo mảng kết quả
    $brands = array();
    
    // Câu truy vấn SQL để lấy tất cả thương hiệu
    $query = "SELECT * FROM brands";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $brands[] = $row; // Thêm từng thương hiệu vào mảng
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $brands = array('error' => 'Không thể lấy dữ liệu từ bảng brands: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $brands;
}

//Hàm lấy ra chi tiết sản phẩm
function getProductDetails($conn, $product_id) {
    // Khởi tạo mảng kết quả
    $product = array();
    
    // Đảm bảo product_id là số nguyên
    $product_id = (int)$product_id;
    
    // Câu truy vấn SQL để lấy chi tiết sản phẩm
    $query = "SELECT * FROM products WHERE product_id = $product_id LIMIT 1";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt && $stmt->num_rows > 0) {
        $product = $stmt->fetch_assoc(); // Lấy dòng dữ liệu đầu tiên
    } else {
        // Trả về lỗi nếu không tìm thấy sản phẩm
        $product = array('error' => 'Không tìm thấy sản phẩm với ID: ' . $product_id);
    }
    
    // Trả về kết quả
    return $product;
}

//Hàm lấy sản phẩm liên quan
function getRelatedProductsByCategory($conn, $categoryID, $limit) {
    // Truy vấn để lấy các sản phẩm liên quan theo CategoryID
    $sql = "SELECT * FROM products WHERE CategoryID = ? LIMIT ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $categoryID, $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $relatedProducts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $relatedProducts[] = $row;
    }
    
    mysqli_stmt_close($stmt);
    return $relatedProducts;
}

//Hàm lấy danh sách sản phẩm từ id danh mục
// function getProductsByCategory($conn, $categoryID) {
//        // Khởi tạo biến kết quả
//        $result = array();
    
//        // Câu truy vấn SQL để lấy tất cả dữ liệu từ bảng products
//        $query = "SELECT * FROM products WHERE CategoryID = $categoryID";
       
//        // Thực thi truy vấn
//        $stmt = $conn->query($query);
       
//        // Kiểm tra và lấy dữ liệu
//        if ($stmt) {
//            while ($row = $stmt->fetch_assoc()) {
//                $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
//            }
//        } else {
//            // Xử lý lỗi nếu truy vấn thất bại
//            $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
//        }
       
//        // Trả về kết quả
//        return $result;
// }

function getProductsByCategory($conn, $categoryID) {
    // Khởi tạo biến kết quả
    $result = array();
    
    // Câu truy vấn SQL với prepared statement
    $query = "SELECT * FROM products WHERE CategoryID = ?";
    
    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        return array('error' => 'Không thể chuẩn bị truy vấn: ' . $conn->error);
    }
    
    // Gán giá trị và thực thi
    $stmt->bind_param("i", $categoryID);
    $stmt->execute();
    
    // Lấy kết quả
    $resultSet = $stmt->get_result();
    
    // Kiểm tra và lấy dữ liệu
    if ($resultSet) {
        while ($row = $resultSet->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Đóng statement
    $stmt->close();
    
    // Trả về kết quả
    return $result;
}

//Hàm lấy danh sách sản phẩm từ brand name
function getProductsByBrandname($conn, $brandID) {
    // Khởi tạo biến kết quả
    $result = array();
 
    // Câu truy vấn SQL để lấy tất cả dữ liệu từ bảng products
    $query = "SELECT * FROM products WHERE brandID = $brandID";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $result;
}

//Hàm lấy sản phẩm nổi bật trang chủ
function getOutstandingProducts($conn) {
    // Khởi tạo biến kết quả
    $result = array();
 
    // Câu truy vấn SQL để lấy tối đa 6 sản phẩm nổi bật từ bảng products
    $query = "SELECT * FROM products WHERE outstanding_products = 'true' LIMIT 6";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $result;
}

// Chức năng để có được các mục tin tức hàng đầu nơi isTop = 'true'
function getTopNews($conn, $limit = 2) {
    $sql = "SELECT news_id, news_name, news_content, new_summary, news_author, news_img, slug, create_time, update_time, isTop 
            FROM news 
            WHERE isTop = ? 
            ORDER BY create_time DESC 
            LIMIT ?";
    $stmt = $conn->prepare($sql);
    $isTop = 'true'; // Match ENUM value
    $stmt->bind_param('si', $isTop, $limit); // 'si' for string and integer
    $stmt->execute();
    $result = $stmt->get_result();
    $topNews = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $topNews;
}
// Hàm lấy danh sách 5 tin tức mới nhất
function getLatestNews($conn) {
    $sql = "SELECT news_id, news_name, news_content, new_summary, news_author, news_img, slug, create_time 
            FROM news 
            ORDER BY create_time DESC 
            LIMIT 4";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $news_list = [];
    while ($row = $result->fetch_assoc()) {
        $news_list[] = $row;
    }
    
    return $news_list;
}


// Hàm lấy phân trang tin tức
function getPaginatedNews($conn, $page = 1, $perPage = 9)
{
    // Đảm bảo page là số dương
    $page = max(1, (int)$page);

    // Tính offset
    $offset = ($page - 1) * $perPage;

    // Đếm tổng số tin tức
    $totalQuery = "SELECT COUNT(*) as total FROM news";
    $totalResult = $conn->query($totalQuery);
    $totalRow = $totalResult->fetch_assoc();
    $totalNews = $totalRow['total'];

    // Tính tổng số trang
    $totalPages = ceil($totalNews / $perPage);

    // Truy vấn lấy tin tức theo trang, bao gồm cả cột slug
    $query = "SELECT news_id, news_name, news_content, news_summary, news_author, news_img, slug, create_time, update_time, isTop FROM news LIMIT $perPage OFFSET $offset";
    $stmt = $conn->query($query);

    // Lấy dữ liệu tin tức
    $news = array();
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $news[] = $row;
        }
    } else {
        $news = array('error' => 'Không thể lấy dữ liệu: ' . $conn->error);
    }

    // Trả về kết quả
    return array(
        'news' => $news,
        'current_page' => $page,
        'total_pages' => $totalPages,
        'per_page' => $perPage,
        'total_news' => $totalNews
    );
}

// Hàm lấy danh sách tin tức
function getDataNews($conn) {
     // Khởi tạo biến kết quả
    $result = array();
 
    // Câu truy vấn SQL để lấy tất cả dữ liệu từ bảng products
    $query = "SELECT * FROM news";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng news: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $result;
}

// Hàm lấy ra chi tiết tin tức dựa vào slug
function getNewsDetails($conn, $slug)
{
    // Khởi tạo mảng kết quả
    $news = array();

    // Bảo vệ slug chống SQL injection
    $slug = mysqli_real_escape_string($conn, $slug);

    // Câu truy vấn SQL để lấy chi tiết tin tức
    $query = "SELECT * FROM news WHERE slug = '$slug' LIMIT 1";

    // Thực thi truy vấn
    $stmt = $conn->query($query);

    // Kiểm tra và lấy dữ liệu
    if ($stmt && $stmt->num_rows > 0) {
        $news = $stmt->fetch_assoc(); // Lấy dòng dữ liệu đầu tiên
    } else {
        // Trả về lỗi nếu không tìm thấy
        $news = array('error' => 'Không tìm thấy tin tức với slug: ' . $slug);
    }

    // Trả về kết quả
    return $news;
}

// Hàm lấy danh sách lĩnh vực
function getDataFields($conn) {
     // Khởi tạo biến kết quả
    $result = array();
 
    // Câu truy vấn SQL để lấy tất cả dữ liệu từ bảng products
    $query = "SELECT * FROM fields";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $result;
}

// Hàm lấy danh sách dịch vụ
function getDataServices($conn) {
     // Khởi tạo biến kết quả
    $result = array();
 
    // Câu truy vấn SQL để lấy tất cả dữ liệu từ bảng products
    $query = "SELECT * FROM services";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Trả về kết quả
    return $result;
}

//Hàm lấy ra chi tiết lĩnh vực
function getFieldDetails($conn, $fieldId) {
    // Khởi tạo mảng kết quả
    $product = array();
    
    // Đảm bảo fieldId là số nguyên
    $fieldId = (int)$fieldId;
    
    // Câu truy vấn SQL để lấy chi tiết sản phẩm
    $query = "SELECT * FROM fields WHERE fieldId = $fieldId LIMIT 1";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt && $stmt->num_rows > 0) {
        $product = $stmt->fetch_assoc(); // Lấy dòng dữ liệu đầu tiên
    } else {
        // Trả về lỗi nếu không tìm thấy sản phẩm
        $product = array('error' => 'Không tìm thấy sản phẩm với ID: ' . $fieldId);
    }
    
    // Trả về kết quả
    return $product;
}

//Hàm lấy danh sách sản phẩm theo lĩnh vực
function getProductsByFieldId($conn, $fieldId) {
    // Khởi tạo biến kết quả
    $result = array();
    
    // Câu truy vấn SQL để lấy 4 sản phẩm theo fieldId
    $query = "SELECT * 
              FROM products 
              WHERE fieldId = ? 
              LIMIT 4";
    
    // Chuẩn bị truy vấn để tránh SQL Injection
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        return array('error' => 'Lỗi chuẩn bị truy vấn: ' . $conn->error);
    }
    
    // Gán tham số và thực thi truy vấn
    $stmt->bind_param("i", $fieldId);
    $stmt->execute();
    
    // Lấy kết quả
    $resultSet = $stmt->get_result();
    
    // Kiểm tra và lấy dữ liệu
    if ($resultSet) {
        while ($row = $resultSet->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Đóng statement
    $stmt->close();
    
    // Trả về kết quả
    return $result;
}

//hàm insert dữ liệu liên hệ - trang contact
function insertContactCustomer($conn, $name, $email, $phone, $address, $subject, $content) {
    // Câu truy vấn SQL để chèn dữ liệu
    $query = "INSERT INTO contact_messages (full_name, email, phone, address, subject, content, created_at) 
              VALUES (?, ?, ?, ?, ?, ?, NOW())";
    
    // Chuẩn bị truy vấn để tránh SQL Injection
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        return array('error' => 'Lỗi chuẩn bị truy vấn: ' . $conn->error);
    }
    
    // Gán tham số
    $stmt->bind_param("ssssss", $name, $email, $phone, $address, $subject, $content);
    
    // Thực thi truy vấn
    if ($stmt->execute()) {
        $result = array('success' => true, 'message' => 'Gửi yêu cầu liên hệ thành công!');
    } else {
        $result = array('error' => 'Lỗi khi chèn dữ liệu: ' . $stmt->error);
    }
    
    // Đóng statement
    $stmt->close();
    
    return $result;
}

//Hàm lấy ra chi tiết thương hiệu
function getBrandDetails($conn, $brandID) {
    // Khởi tạo mảng kết quả
    $product = array();
    
    // Đảm bảo brandID là số nguyên
    $brandID = (int)$brandID;
    
    // Câu truy vấn SQL để lấy chi tiết sản phẩm
    $query = "SELECT * FROM brands WHERE brandID = $brandID LIMIT 1";
    
    // Thực thi truy vấn
    $stmt = $conn->query($query);
    
    // Kiểm tra và lấy dữ liệu
    if ($stmt && $stmt->num_rows > 0) {
        $product = $stmt->fetch_assoc(); // Lấy dòng dữ liệu đầu tiên
    } else {
        // Trả về lỗi nếu không tìm thấy sản phẩm
        $product = array('error' => 'Không tìm thấy sản phẩm với ID: ' . $brandID);
    }
    
    // Trả về kết quả
    return $product;
}

//Hàm lấy danh sách sản phẩm theo thương hiệu
function getProductsByBrand($conn, $brandID) {
    // Khởi tạo biến kết quả
    $result = array();
    
    // Câu truy vấn SQL để lấy 4 sản phẩm theo brandID
    $query = "SELECT * 
              FROM products 
              WHERE brandID = ? 
              LIMIT 4";
    
    // Chuẩn bị truy vấn để tránh SQL Injection
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        return array('error' => 'Lỗi chuẩn bị truy vấn: ' . $conn->error);
    }
    
    // Gán tham số và thực thi truy vấn
    $stmt->bind_param("i", $brandID);
    $stmt->execute();
    
    // Lấy kết quả
    $resultSet = $stmt->get_result();
    
    // Kiểm tra và lấy dữ liệu
    if ($resultSet) {
        while ($row = $resultSet->fetch_assoc()) {
            $result[] = $row; // Thêm từng dòng dữ liệu vào mảng kết quả
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $result = array('error' => 'Không thể lấy dữ liệu từ bảng products: ' . $conn->error);
    }
    
    // Đóng statement
    $stmt->close();
    
    // Trả về kết quả
    return $result;
}

//Hàm lấy ra chi tiết dịch vụ
function getServiceDetails($conn, $serviceID)
{
    // Khởi tạo mảng kết quả
    $product = array();

    // Đảm bảo service_id  là số nguyên
    $service_id  = (int)$serviceID;

    // Câu truy vấn SQL để lấy chi tiết sản phẩm
    $query = "SELECT * FROM services WHERE service_id  = $service_id  LIMIT 1";

    // Thực thi truy vấn
    $stmt = $conn->query($query);

    // Kiểm tra và lấy dữ liệu
    if ($stmt && $stmt->num_rows > 0) {
        $product = $stmt->fetch_assoc(); // Lấy dòng dữ liệu đầu tiên
    } else {
        // Trả về lỗi nếu không tìm thấy sản phẩm
        $product = array('error' => 'Không tìm thấy sản phẩm với ID: ' . $service_id );
    }

    // Trả về kết quả
    return $product;
}

//Hàm lấy danh sách dịch vụ
function getAllServices($conn)
{
    // Khởi tạo mảng kết quả
    $services = array();

    // Câu truy vấn SQL để lấy tất cả thương hiệu
    $query = "SELECT * FROM services";

    // Thực thi truy vấn
    $stmt = $conn->query($query);

    // Kiểm tra và lấy dữ liệu
    if ($stmt) {
        while ($row = $stmt->fetch_assoc()) {
            $services[] = $row; // Thêm từng thương hiệu vào mảng
        }
    } else {
        // Xử lý lỗi nếu truy vấn thất bại
        $services = array('error' => 'Không thể lấy dữ liệu từ bảng services: ' . $conn->error);
    }

    // Trả về kết quả
    return $services;
}
?>
