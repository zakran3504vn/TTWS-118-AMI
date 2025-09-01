<?php
    include('../config/db_connection.php');
    include_once('../truongthanhwebkit/webkit.php');

    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $result = getPaginatedNews($conn, $filter, $page, 4);

    if ($result['news'] && count($result['news']) > 0) {
        foreach ($result['news'] as $row) {
            $date = date('d/m/Y', strtotime($row['created_at']));
            echo '
            <a href="news_detail.php?id='.$row['id'].'" class="group block">
                <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col md:flex-row">
                    <img src="'.$row['image'].'" alt="'.$row['title'].'" class="w-full md:w-64 h-auto object-cover">
                    <div class="p-6 flex-1">
                        <span class="text-sm text-primary mb-2 inline-block">'.$row['category'].'</span>
                        <h3 class="text-xl font-semibold mb-3 group-hover:text-primary transition-colors">'.$row['title'].'</h3>
                        <p class="text-gray-600 mb-4">'.$row['summary'].'</p>
                        <div class="flex items-center gap-6 text-sm text-gray-500">
                            <span class="flex items-center gap-2">
                                <i class="ri-time-line"></i> '.$date.'
                            </span>
                            <span class="flex items-center gap-2">
                                <i class="ri-eye-line"></i> '.$row['views'].' lượt xem
                            </span>
                        </div>
                    </div>
                </article>
            </a>';
        }
    } else {
        echo '<p class="text-center text-gray-500">Chưa có bài viết nào.</p>';
    }

    // Output pagination metadata
    echo '<div id="pagination-data" data-total-pages="' . $result['total_pages'] . '" style="display:none"></div>';
?>