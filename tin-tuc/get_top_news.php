<?php
include('../config/db_connection.php');
include_once('../truongthanhwebkit/webkit.php');

$topNews = getTopNews($conn, 3);

if ($topNews && count($topNews) > 0) {
    foreach ($topNews as $row) {
        $date = date('d/m/Y', strtotime($row['created_at']));
        echo '
        <a href="news_detail.php?id='.$row['id'].'" class="flex gap-4">
            <img src="'.$row['image'].'" 
                 alt="'.$row['title'].'" 
                 class="w-20 h-20 rounded object-cover">
            <div class="flex-1">
                <h4 class="font-medium text-gray-800 group-hover:text-black transition-colors">'
                .$row['title'].'</h4>
                <p class="text-sm text-gray-500 mt-1">'.$date.'</p>
            </div>
        </a>';
    }
} else {
    echo "<p class='text-gray-500 text-sm'>Chưa có tin nổi bật.</p>";
}
?>
