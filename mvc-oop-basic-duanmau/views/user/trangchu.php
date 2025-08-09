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
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.2s ease;
            padding-bottom: 15px;
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
        .price {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .btn-detail {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-detail:hover {
            background: #218838;
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
        <img src="uploads/<?php echo htmlspecialchars($sp->image); ?>" alt="<?php echo htmlspecialchars($sp->name); ?>">
        <h3><?php echo htmlspecialchars($sp->name); ?></h3>
        <p class="price"><?php echo number_format($sp->price, 0, ',', '.'); ?> VNĐ</p>
        <a class="btn-detail" href="index.php?act=chitietsanpham&id=<?php echo $sp->id; ?>">Xem chi tiết</a>
    </div>
    <?php endforeach; ?>
</div>

</body>
</html>

<?php require_once 'views/layouts/footer.php'; ?>
