<?php
    include('../config/db_connection.php');
    
    // --- Pagination ---
    $limit  = 6; // cards per page
    $page   = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $offset = ($page - 1) * $limit;

    // Total rows
    $total = 0;
    $resTotal = $conn->query("SELECT COUNT(*) AS total FROM news");
    if ($resTotal) {
        $rowTotal = $resTotal->fetch_assoc();
        $total = (int)$rowTotal['total'];
    }
    $totalPages = max(1, (int)ceil($total / $limit));

    // Fetch rows
    $sql = "SELECT id, title, summary, publish_at, views, image
            FROM news
            ORDER BY publish_at DESC
            LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);

    // Optional default image path if image is NULL/empty
    $defaultThumb = "/assets/img/news-placeholder.jpg";
?>
<!-- ↓↓↓ From here on it's HTML (PHP closed above) ↓↓↓ -->

<div class="space-y-6">
<?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <?php
            $thumb = !empty($row['image']) ? $row['image'] : $defaultThumb;
            $title = htmlspecialchars($row['title'] ?? '', ENT_QUOTES, 'UTF-8');
            $summary = htmlspecialchars($row['summary'] ?? '', ENT_QUOTES, 'UTF-8');
            $dateOut = $row['publish_at'] ? date("d/m/Y", strtotime($row['publish_at'])) : '';
            $viewsOut = number_format((int)($row['views'] ?? 0));
        ?>
        <a href="./detail_new.php?id=<?= (int)$row['id'] ?>" class="block">
            <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col md:flex-row">
                <img src="<?= $thumb ?>" alt="<?= $title ?>" class="w-full md:w-64 h-auto object-cover">
                <div class="p-6 flex-1">
                    <span class="text-sm text-primary mb-2 inline-block">Tin tức mới nhất</span>
                    <h3 class="text-xl font-semibold mb-3"><?= $title ?></h3>
                    <p class="text-gray-600 mb-4"><?= $summary ?></p>
                    <div class="flex items-center gap-6 text-sm text-gray-500">
                        <span class="flex items-center gap-2">
                            <i class="ri-time-line"></i>
                            <?= $dateOut ?>
                        </span>
                        <span class="flex items-center gap-2">
                            <i class="ri-eye-line"></i>
                            <?= $viewsOut ?> lượt xem
                        </span>
                    </div>
                </div>
            </article>
        </a>
    <?php endwhile; ?>
<?php else: ?>
    <p class="text-gray-500">Chưa có bài viết nào.</p>
<?php endif; ?>
</div>

<!-- Pagination -->
<?php if ($totalPages > 1): ?>
<div class="flex justify-center mt-6">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>"
           class="px-3 py-1 rounded-full <?= ($i === $page) ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700' ?> mx-1">
           <?= $i ?>
        </a>
    <?php endfor; ?>
</div>
<?php endif; ?>
