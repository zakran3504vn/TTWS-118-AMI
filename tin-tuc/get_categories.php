<?php
    include('../config/db_connection.php');
    include_once('../truongthanhwebkit/webkit.php');

    $categories = [
        "Tin tức mới nhất",
        "Cẩm nang du lịch",
        "Khuyến mãi tour",
        "Tin ngành"
    ];

    $counts = getCategoryCounts($conn);

    foreach ($categories as $cat) {
        $count = isset($counts[$cat]) ? $counts[$cat] : 0;
        echo '<a class="flex items-center justify-between py-2 hover:text-primary transition-colors">
                <span>'.$cat.'</span>
                <span class="text-sm text-gray-500">'.$count.'</span>
            </a>';
    }

?>