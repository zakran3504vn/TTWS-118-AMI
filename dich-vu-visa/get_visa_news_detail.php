<?php
    include('../config/db_connection.php');
    include_once('../truongthanhwebkit/webkit.php');

    $filter = 'Visa'; // Fixed filter for visa-related news
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $result = getPaginatedVisaNews($conn, $filter, $page, 6, $search);

    if ($result['news'] && count($result['news']) > 0) {
        foreach ($result['news'] as $row) {
            $date = date('d/m/Y', strtotime($row['created_at']));
            echo '
                <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                    <img src="'.$row['image'].'" alt="'.$row['title'].'" class="w-full h-48 object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <span class="text-primary rounded text-l mb-3 inline-block w-fit">'.$date.'</span>
                        <h3 class="text-lg font-semibold mb-2">'.$row['title'].'</h3>
                        <p class="text-gray-600 mb-4 text-sm">'.$row['summary'].'</p>
                        <a href="get_visa_news.php?id='.$row['id'].'"
                        class="mt-1 bg-primary text-white px-3 py-1 rounded text-sm hover:bg-secondary transition-colors self-start">Đọc thêm</a>
                    </div>
                </article>';
        }
    } else {
        echo '<p class="text-center text-gray-500">Chưa có tin visa nào.</p>';
    }
    
    // Output pagination metadata
    echo '<div id="pagination-data" data-total-pages="' . $result['total_pages'] . '" style="display:none"></div>';
?>
