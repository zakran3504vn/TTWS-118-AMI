<?php
    include('../config/db_connection.php');
    include('../truongthanhwebkit/webkit.php');

    // Get sorting parameter
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

    // Fetch tours
    $result = getPaginatedToursByPrice($conn, $sort, $page, 3);

    if ($result['tours'] && count($result['tours']) > 0) {
        foreach ($result['tours'] as $tour) {
            echo '
            <div class="tour-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow"
                data-continent="'.htmlspecialchars($tour['continent']).'" 
                data-price="'.htmlspecialchars($tour['sale_price']).'" 
                data-duration="'.htmlspecialchars($tour['duration_days']).'">
                <div class="relative">
                    <img src="'.htmlspecialchars($tour['image_url']).'" 
                        alt="'.htmlspecialchars($tour['title']).'" 
                        class="w-full h-54 object-cover object-top">
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-semibold mb-2">'.htmlspecialchars($tour['title']).'</h3>
                    <div class="flex items-center gap-2 text-sm text-black mb-2">
                        <i class="ri-map-pin-line"></i>
                        <span>Nơi khởi hành: '.htmlspecialchars($tour['departure_location']).'</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-black mb-2">
                        <i class="ri-map-pin-2-line"></i>
                        <span>Nơi đến: '.htmlspecialchars($tour['destination']).'</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-black mb-3">
                        <i class="ri-time-line"></i>
                        <span>Thời gian: '.htmlspecialchars($tour['duration_days']).' ngày '.htmlspecialchars($tour['duration_nights']).' đêm</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-gray-500 line-through text-lg">'.number_format($tour['regular_price'], 0, ',', '.').' đ</span>
                            <span class="text-primary font-bold text-xl">'.number_format($tour['sale_price'], 0, ',', '.').' đ</span>
                        </div>
                        <a href="./detail_tour.php?id='.htmlspecialchars($tour['id']).'"
                            class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                            XEM TOUR    
                        </a>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo '<p class="text-center text-gray-500">Không tìm thấy tour nào.</p>';
    }

    // Output pagination metadata
    echo '<div id="pagination-data" 
            data-total-pages="'.$result['total_pages'].'" 
            data-current-page="'.$result['current_page'].'" 
            style="display:none"></div>';
?>