<?php require_once 'views/layouts/header.php'; ?> 

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kết quả tìm kiếm</title> 
    <style>
        .search-title {
            margin: 20px 0;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 0 20px;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background: white;
            text-align: center;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card h5 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-card p {
            color: #e74c3c;
            font-weight: bold;
        }
        .product-card a {
            display: inline-block;
            margin-bottom: 10px;
            padding: 6px 12px;
            background: #777;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }
        
        .no-result {
            text-align: center;
            margin: 40px 0;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

    <h2 class="search-title">
        Kết quả tìm kiếm cho: 
        <?= htmlspecialchars($keyword ?? '') ?>
    </h2>

    <?php if (!empty($products)): ?>
        <div class="product-list">
            <?php foreach ($products as $p): ?>
                <div class="product-card">
                    <img src="uploads/<?= $p['image'] ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                    <h5><?= htmlspecialchars($p['name']) ?></h5>
                    <p><?= number_format($p['price'], 0, ',', '.') ?> đ</p>
                    <a href="?act=chitietsanpham&id=<?= $p['id'] ?>">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="no-result">Không tìm thấy sản phẩm nào phù hợp.</p>
    <?php endif; ?>

</body>
</html>

<?php require_once 'views/layouts/footer.php'; ?>
