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

    echo '<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="font-semibold mb-4">Danh mục</h3>
            <div class="space-y-2">';

    foreach ($categories as $cat) {
        $count = isset($counts[$cat]) ? $counts[$cat] : 0;
        echo '<a href="#" class="flex items-center justify-between py-2 hover:text-primary transition-colors">
                <span>'.$cat.'</span>
                <span class="text-sm text-gray-500">'.$count.'</span>
            </a>';
    }

    echo '</div></div>';
?>