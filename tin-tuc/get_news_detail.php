<?php
    // File: get_news_detail.php
    header('Content-Type: application/json');

    include('../config/db_connection.php');
    include_once('../truongthanhwebkit/webkit.php');

    // Get news ID from URL
    $newsId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // Fetch news details
    $news = getNewsDetails($conn, $newsId);

    // Check if news exists
    if (isset($news['error'])) {
        echo json_encode(['error' => $news['error']]);
        exit;
    }

    // Format date and views
    $news['formatted_date'] = date('d/m/Y', strtotime($news['created_at']));
    $news['formatted_views'] = number_format($news['views']) . ' lượt xem';

    // Fetch related news
    $relatedNews = getRelatedNews($conn, $news['category'], $news['id'], 3);

    // Format related news dates
    foreach ($relatedNews as &$related) {
        $related['formatted_date'] = date('d/m/Y', strtotime($related['created_at']));
    }

    echo json_encode([
        'news' => $news,
        'related_news' => $relatedNews
    ]);

    $conn->close();
?>