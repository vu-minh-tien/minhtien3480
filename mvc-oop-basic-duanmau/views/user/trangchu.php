<?php require_once 'views/layouts/header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px auto;
            max-width: 1200px;
        }
        .product-card {
            position: relative;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.2s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .product-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .price-old {
            text-decoration: line-through;
            color: gray;
            font-size: 14px;
        }
        .price {
            color: red;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .btn-detail {
            display: inline-block;
            background: #777;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .badge-sale {
            position: absolute;
            top: 10px;
            left: 10px;
            background: red;
            color: white;
            padding: 5px 8px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1 style="text-align:center;">Danh sách sản phẩm</h1>

<?php if (!empty($thongbao)) : ?>
    <p style="text-align:center;color:red;"><?php echo $thongbao; ?></p>
<?php endif; ?>

<div class="product-container">
    <?php foreach($danhsach_sp as $sp): ?>
        <div class="product-card">
            <?php if (!empty($sp->discount) && $sp->discount > 0): ?>
                <span class="badge-sale">-<?php echo $sp->discount; ?>%</span>
            <?php endif; ?>

            <img src="uploads/<?php echo htmlspecialchars($sp->image); ?>" alt="<?php echo htmlspecialchars($sp->name); ?>">
            <h3><?php echo htmlspecialchars($sp->name); ?></h3>

            <?php if (!empty($sp->discount) && $sp->discount > 0): ?>
                <?php 
                    $price_old = $sp->price;
                    $price_new = $price_old - ($price_old * $sp->discount / 100);
                ?>
                <p class="price-old"><?php echo number_format($price_old, 0, ',', '.'); ?> đ</p>
                <p class="price"><?php echo number_format($price_new, 0, ',', '.'); ?> đ</p>
            <?php else: ?>
                <p class="price"><?php echo number_format($sp->price, 0, ',', '.'); ?> đ</p>
            <?php endif; ?>

            <a href="index.php?act=chitietsanpham&id=<?php echo $sp->id; ?>" class="btn-detail">Xem chi tiết</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>

<?php require_once 'views/layouts/footer.php'; ?>
